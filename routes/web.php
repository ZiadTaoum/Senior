<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LostitemController;
use App\Http\Controllers\FounditemController;
use App\Http\Controllers\FounditemDescriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::any('/login', [LoginController::class, 'login'])->name('login');

Route::get('/registration',[AuthController::class, 'registration'])->name('registration');
Route::post('/registration',[AuthController::class, 'registrationPost'])->name('registration.post');

Route::group(['middleware' => 'auth'], function () {

    //Buttons
    Route::get('/search', [HomeController::class, 'search']);
    Route::get('/report-found-item', [HomeController::class, 'reportFoundItem']);
    Route::get('/report-lost-item', [HomeController::class, 'reportLostItem']);
    
    Route::resource('/founditem',FounditemController::class);
    Route::resource('/founditemdescription',FounditemDescriptionController::class);
    
    Route::resource('/lostitem',LostitemController::class);

    Route::get('/founditems', [AdminController::class, 'foundItems'])->name('foundItems');
    
    Route::resource('/reviews', ReviewController::class);
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    Route::group(['middleware' => 'isAdmin'], function () { //only admin can access
        Route::resource('/items',AdminController::class);
        
        Route::get('/admin/lost-items/{id}/edit', 'AdminController@editLostItem')->name('admin.editLostItem');
        Route::get('/admin/found-items/{id}/edit', 'AdminController@editFoundItem')->name('admin.editFoundItem');
        Route::delete('/admin/lost-items/{id}', 'AdminController@destroyLostItem')->name('admin.destroyLostItem');
        Route::delete('/admin/found-items/{id}', 'AdminController@destroyFoundItem')->name('admin.destroyFoundItem');

    });
});








// Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');


// Route::middleware(['auth'])->group(function () {




// //     Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
// });

// Route::middleware(['auth'])->group(function () {

   // Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    //Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
     //->except(['index', 'create', 'store']);

// });