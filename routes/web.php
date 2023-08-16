<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home.welcome');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/live-oak-park', [HomeController::class, 'liveOakPark'])->name('home.park');
Route::get('/pier', [HomeController::class, 'pier'])->name('home.pier');
Route::get('/cbca', [HomeController::class, 'cbca'])->name('home.cbca');
Route::get('/cbce', [HomeController::class, 'cbce'])->name('home.cbce');
Route::get('/calendar', [HomeController::class, 'calendar'])->name('home.calendar');

Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

Route::get('/content/{slug}', [PageController::class, 'view'])->name('page.view');



Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth', 'admin')->group(function () {
    Route::resource('membership', MembershipController::class);
    Route::get('/members/list', [MemberController::class, 'index'])->name('member.list');
    Route::get('/members/edit/{id}', [MemberController::class, 'edit'])->name('member.edit');
    Route::get('/members/show/{id}', [MemberController::class, 'show'])->name('member.show');
    Route::get('/members/delete/{id}', [MemberController::class, 'delete'])->name('member.delete');

    Route::get('/contact-us/list', [ContactUsFormController::class, 'index'])->name('contact-us.list');
    Route::get('/contact-us/view/{id}', [ContactUsFormController::class, 'show'])->name('contact-us.view');
    Route::get('/contact-us/delete/{id}', [ContactUsFormController::class, 'delete'])->name('contact-us.delete');

    Route::get('/page/list', [PageController::class, 'index'])->name('page.list');
    Route::put('/page/edit/{id}', [PageController::class, 'edit'])->name('page.edit-save');
    Route::get('/page/design/{id}', [PageController::class, 'editor'])->name('page.design');
    Route::get('/page/edit/{id}', [PageController::class, 'edit'])->name('page.edit');
    Route::get('/page/create', [PageController::class, 'create'])->name('page.create');
    Route::post('/page/create', [PageController::class, 'create'])->name('page.create-save');
    Route::get('/page/delete/{id}', [PageController::class, 'delete'])->name('page.delete');



});


Route::get('/paywithpaypal', [PayPalController::class, 'payWithPaypal'])
    ->name('paywithpaypal');
Route::get('/paypal-start', [PayPalController::class, 'postPaymentWithPayPal'])
    ->name('paypal-start');
Route::get('/paypal', [PayPalController::class, 'getPaymentStatus'])->name('status');



require __DIR__.'/auth.php';
