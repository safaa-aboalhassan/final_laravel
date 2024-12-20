<?php
use App\Models\Role;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WitterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/lang/en', 'LanguageController@switchToEnglish')->name('lang.en');
Route::get('/lang/ar', 'LanguageController@switchToArabic')->name('lang.ar');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::resource('food', FoodController::class);
Route::resource('order', OrderController::class);
Route::resource('user', UserController::class);


Route::middleware('auth')->group(function () {
    //rout gategory
Route::resource('category', CategoryController::class);

//************* */
//rout chef
Route::resource('chef', ChefController::class);
//************* */
//rout witter
Route::resource('witter', WitterController::class);
//************* */
//rout table
Route::resource('table', TableController::class);
//************* */

//rout food

//************* */

//rout order

//************* */

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('login', [AuthController::class, 'handel_login'])->name('login');
});
///middleware admin


Route::group(['middleware' => ['auth']], function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
         ->middleware('role:admin');
         
    Route::get('/chef/dashboard', [ChefController::class, 'dashboard'])
         ->middleware('role:chef');
         
    Route::get('/waiter/dashboard', [WitterController::class, 'dashboard'])
         ->middleware('role:waiter');
         
    Route::get('/', [AuthController::class, 'login'])->name('auth.login');
    

    
    Route::get('/sign-up', [AuthController::class, 'signup'])->name('auth.signup');
    
    Route::post('/sign-up', [AuthController::class, 'handle_signup'])->name('auth.handle.signup');
   
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    // Route::get('login', [AuthController::class, 'handel_login'])->name('login');

});




require __DIR__.'/auth.php';
