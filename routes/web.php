<?php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\BodytypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\StateController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', ['latestproducts' => App\Models\Product::latest()->limit(5)->get()]);
})->name('home');

Route::get('/latests', function () {
    return response()->json(App\Models\Product::latest()->limit(5)->get());
});




Route::resource('products', ProductController::class);
Route::get('/states', [StateController::class, 'index']);
Route::get('/states/{state}', [StateController::class, 'show']);

Route::get('/contact', [ContactController::class, 'getContact'])->name('contact');

Route::name('dashboard.')->prefix('dashboard')->group(function () {
    
    Route::get('/trackings', function (Request $request) {
        return view('dashboard.listings', ['products' => \App\Models\Product::where('user_id', $request->user()->id)->get()]);
    })->name('listings');

    Route::get('/profile', function (Request $request) {
        return view('dashboard.profile', ['user' => $request->user()]);
    })->name('profile');  

});


Route::post('/fileupload', function (Request $request) {
    if ($request->file('file')->isValid()) {
        $path = $request->file->store('/public/temp');
        $url = Storage::url($path);
        return response()->json(['url' => $url, 'path' => $path]);
    }
});

require __DIR__.'/auth.php';

Route::name('admin.')->prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('admin.home');
    })->name('home');
    
    

    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('models', ModelController::class);
});

Route::resource('users', UserController::class);
Route::resource('brands', BrandController::class);
Route::resource('models', ModelController::class);
Route::resource('images', ImageController::class);


Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});