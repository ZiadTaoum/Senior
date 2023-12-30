<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LostitemController;
use App\Http\Controllers\FounditemController;
use App\Http\Controllers\CompareitemsController;
use App\Http\Controllers\LostitemDescriptionController;
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
    // Mail::to(User::find(1))->send(new ItemFound(FoundItem::find(1)));
    return view('welcome');
});

// Route::get('/send-test-email', [TestController::class, 'sendTestEmail'])->name('send.test.email');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::any('/login', [LoginController::class, 'login'])->name('login');

Route::get('/registration',[AuthController::class, 'registration'])->name('registration');
Route::post('/registration',[AuthController::class, 'registrationPost'])->name('registration-post');

Route::group(['middleware' => 'auth'], function () {

    //Buttons
    Route::get('/search', [HomeController::class, 'search']);
    Route::get('/report-found-item', [HomeController::class, 'reportFoundItem']);
    Route::get('/report-lost-item', [HomeController::class, 'reportLostItem']);
    //

    Route::resource('/founditem',FounditemController::class, ['parameters' => [
        'show' => 'found_item_id'
    ]]);
    Route::resource('/founditemdescription',FounditemDescriptionController::class, ['parameters' => [
        'create' => 'found_item_id'
    ]]);
    
    Route::resource('/lostitem',LostitemController::class);
    Route::resource('/lostitemdescription',LostitemDescriptionController::class, ['parameters' => [
        'create' => 'lost_item_id'
    ]]);

    Route::get('/founditems', [AdminController::class, 'foundItems'])->name('foundItems');
    Route::get('/lostitems', [AdminController::class, 'lostItems'])->name('lostItems');

    
    Route::resource('/reviews', ReviewController::class);
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    Route::group(['middleware' => 'isAdmin'], function () { //only admin can access
        Route::resource('/items',AdminController::class);
        
        // Route::resource('/adminReview',ReviewController::class);

        Route::resource('/compare_items', CompareitemsController::class);
        Route::get('/compare-items', [CompareitemsController::class, 'compareItemsDescriptions']);
    });

    Route::get('/getCategories', [APIController::class, 'getCategories'])->name('get-categories');
    Route::get('/getAddresses', [APIController::class, 'getAddresses'])->name('get-addresses');
    // Route::get('/searchCategory/{category}', [APIController::class, 'searchCategory'])->name('search-category');
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