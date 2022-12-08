<?php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MakeController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\BodytypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
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
    return view('home');
})->name('home');

Route::get('/location', function () {
    $file = json_decode(file_get_contents(base_path('states-and-cities.json')), true);

    $data = [];
    foreach($file as $state){
        $state_info = [];

        $state_info['name'] = $state['name'];
        $state_info['slug'] = Str::slug(Str::lower($state['name']));

        foreach($state['cities'] as $city){
            $cities = [];

            $cities['name'] = $city;
            $cities['slug'] = Str::slug(Str::lower($city));
            $state_info['cities'][] = $cities; 
        }
        $data[] = $state_info;
    }
    return response()->json($data);
})->name('location');

Route::resource('cars', CarController::class);
Route::get('/contact', [ContactController::class, 'getContact'])->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::post('/fileupload', function (Request $request) {
    if ($request->file('file')->isValid()) {
        $path = $request->file->store('/public/temp');
        $url = Storage::url($path);
        return response()->json(['url' => $url, 'path' => $path]);
    }
});

require __DIR__.'/auth.php';


Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.home');
    })->name('home');
    
    Route::name('cars.')->prefix('cars')->group(function () {
        Route::get('/create', function () {
            return view('admin.car.create');
        })->name('create');
    });

    Route::resource('users', UserController::class);
    Route::resource('makes', MakeController::class);
    Route::resource('models', ModelController::class);
    Route::resource('bodytypes', BodytypeController::class);
});

Route::resource('users', UserController::class);
Route::resource('makes', MakeController::class);
Route::resource('bodytypes', BodytypeController::class);
Route::resource('models', ModelController::class);
// Route::resource('images', ImageController::class);


Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});