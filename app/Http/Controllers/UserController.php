<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Events\NewUserAdded;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = user::all();
        if(request()->expectsJson())
            return response()->json($users);
        else
            return view('admin.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'unique:users',  'max:255'],
            'phone' => ['required', 'string', 'unique:users', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        if(!$request->filled('state_id')){
            $request->validate([
                'state' => ['required', 'string', 'max:255'],
            ]);
        }
        if(!$request->filled('city_id')){
            $request->validate([
                'city' => ['required', 'string', 'max:255'],
            ]);
        }
        $slug = Str::slug(Str::title($request->first_name.' '.$request->last_name), '-');
        $slug_exist = User::where('slug', '=', $slug)->get();
        $slug = count($slug_exist)? $slug. '-' .count($slug_exist) + 1 : $slug;
        
        $data = [];
        $props = (new User)->getFillables();

        foreach($props as $prop)
            $data[$prop] = $request->input($prop);
        $data['slug'] = $slug; 
        $data['password'] = Hash::make($request->password); 
        
        $user = User::create($data);

        event(new NewUserAdded($user, $token=Str::random(60)));

        if($request->expectsJson())
            return response()->json(['data'=>'user added']);
        else 
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = [];

        $props = (new User)->getFillables();

        foreach($props as $prop){
            if($request->filled($prop)){
                $user->fill([$prop => $request->input($prop)]);
            }
        }

        if($request->filled('password')){
            $user->fill(['password' => Hash::make($request->password)]);
        }

        $user->save();

        if($request->expectsJson())
            return response()->json(['data' => 'user edited']);
        else 
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
