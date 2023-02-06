<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Image;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Events\ModelCreated;

class ProductController extends Controller
{
   
    public function __construct()
    {
        $this->middleware(['auth'])->except(['show', 'index']);
        $this->authorizeResource(Product::class, 'product');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->routeIs('admin.*'))
            return view('admin.product.index', ['products' => Product::all()]);
        return view('product.index', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(request()->routeIs('admin.*'))
            return view('admin.product.create', ['categories' => (new Product)->categories]);
        return view('product.create', ['categories' => (new Product)->categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
        $props = ['price', 'state_id', 'city_id', 'address',
        'brand_id', 'model_id', 'color', 'year'];

        foreach($props as $prop){
            if(strpos($prop, '_')){
                $prop_name = (explode('_', $prop))[0];
            } else {
                $prop_name = $prop;
            }

            if(!$request->filled($prop)){
                $request->validate([
                    $prop_name => ['required', 'string', 'max:255'],
                ]);
            }
        }

        $category = (new Product)->categories[$request->category];
        foreach ($category as $prop_key => $prop_values) {
            foreach ($prop_values as $value) {
                if(!$request->filled($prop_key[$value['name']])){
                    $request->validate([
                        $prop_key.$value['name'] => ['required', 'string', 'max:255'],
                    ]);
                }
            }
        }

        $product = Product::create([$request->all]);

        $images = json_decode($request->images);

        $name = Str::title($request->year.' '.Brand::find($request->brand)->name.' '.Model::find($request->model)->name);
        $slug = Str::slug($name, '-');

        $name_exist = Product::where('name', '=', $name)->get();
        $slug = count($name_exist)? $slug. '-' .count($name_exist) + 1 : $slug;
        
        foreach ($request->all() as $req_key => $req_values) {
            if(array_key_exists($req_key, $category)){
                foreach($req_values as $prop_key => $prop_value){
                    // foreach($props as $prop){
                    //     $name = Str::slug(Str::lower($request->input($value['name'])), '_');

                        $product->meta()->create([
                            'prop' => $req_key,
                            'key' => $prop_key,
                            'value' => $prop_value
                        ]);
                    // }
                }
            }
        }
        event(new ModelCreated(get_class($product), $product->id, $images));

        if($request->expectsJson())
            return response()->json($product);
        else 
            return redirect()->back();
        //  return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if(request()->routeIs('admin.*'))
            return view('admin.product.show', ['product' => $product]);
        return view('product.show', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if(request()->routeIs('admin.*'))
            return view('admin.product.edit', ['product' => $product]);
        return view('product.edit', ['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    // private function name()
    // {
    //     $name = Str::title($request->year.' '.Brand::find($request->brand)->name.' '.Model::find($request->model)->name);
    //     return $name
    // }
    public function update(Request $request, Product $product)
    {
        $name = Str::title($request->year.' '.Brand::find($request->brand||$product->make_id)->name.' '.Model::find($request->model||$product->model_id)->name);

        $props = (new Product)->getFillables();

        foreach($props as $prop){
            if($request->has($prop) && $request->filled($prop)){
                $product->fill([$prop => $request->input($prop)]);
                $product->fill(['name' => $name]);
            }
        }

        if($request->has('images') && $request->filled('images')){
            $images = json_decode($request->images);
            event(new ModelCreated(get_class($product), $product->id, $images));
        }

        $product->save();


        if($request->expectsJson())
            return response()->json(['data'=>'Product edited']);
        else 
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
