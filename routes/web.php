<?php

use App\Http\Controllers\admin\AboutusController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DisplayEditorController;
use App\Http\Controllers\admin\GeneralSettingController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\SlidesController;
use App\Http\Controllers\admin\SocialMediaController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayamentMethodController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\CardController;
use App\Http\Controllers\user\ContactUsController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\ProductController as userProduct;
use App\Http\Controllers\user\ProjectController as UserProject;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/contact-us',[ContactUsController::class,'index'])->name('contactus');
Route::get('/projects',[UserProject::class,'index'])->name('user.project.index');
Route::get('/project/{id}',[UserProject::class,'show'])->name('user.project.show');
Route::get('/store',[userProduct::class,'index'])->name('store');
Route::get('/card',[CardController::class,'index'])->name('card');
Route::get("/order-print/{id}",[OrderController::class,'orderPrintPage'])->name('order_print_page');
Route::get("/order-design/{id}",[OrderController::class,'orderDesignPage'])->name('order_design_page');


Route::middleware(['auth','verified'])->group(function() {
    Route::post('order', [OrderController::class, 'orderStore'])->name('orderStore');
    Route::resource('cart',\App\Http\Controllers\CartController::class);
    Route::post('cart/print/{id}',[\App\Http\Controllers\CartController::class,'storePrint'])->name("storePrint");
    Route::post('/product-cart-delete',[CartController::class,"cartProductDelete"])->name("cart_product.delete");

    Route::post('setting-payament', [PayamentMethodController::class,'store'])->name('setting-payament.store');
    Route::get('setting-payament', [PayamentMethodController::class,'index'])->name('setting-payament.index');
    Route::post('setting-payament/update', [PayamentMethodController::class,'update'])->name('setting-payament.update');

    Route::post('checkout/{id}',[CheckoutController::class,'createOrder'])->name('user.checkout');
    Route::get('paypal/return',[CheckoutController::class,'paypalReturn'])->name('paypal.return');
    Route::get('paypal/cancel',[CheckoutController::class,'paypalCancel'])->name('paypal.cancel');
    Route::get('checkout/{id}', [CheckoutController::class,'index'])->name('checkout.index');

    Route::get('/checkout-stripe/{id}', [PaymentController::class, 'index'])->name('stripe');
    Route::post('/transaction/{id}', [PaymentController::class, 'makePayment'])->name('make-payment');

});



Route::middleware(['auth','verified','check:admin'])->prefix('admin')->group(function(){

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/general',[GeneralSettingController::class,'create'])->name('general.create');
    Route::post('/general',[GeneralSettingController::class,'store'])->name('general.store');
    Route::post('/general/update',[GeneralSettingController::class,'update'])->name('general.update');

    Route::resource('slide',SlidesController::class);

    Route::get('/about-us',[AboutusController::class,'create'])->name('about_us.create');
    Route::post('/about-us',[AboutusController::class,'store'])->name('about_us.store');
    Route::put('/about-us/{id}',[AboutusController::class,'update'])->name('about_us.update');

    Route::get('/social-media',[SocialMediaController::class,'create'])->name('social.create');
    Route::post('/social-media',[SocialMediaController::class,'store'])->name('social.store');
    Route::post('/social-media/update',[SocialMediaController::class,'update'])->name('social.update');

    Route::get('/users' ,[UserController::class,'index'])->name('users.index');
    Route::post('/users-type/{id}' ,[UserController::class,'changeType'])->name('user.change_type');

    Route::resource('message',MessageController::class)->except('create','edit');
    Route::resource('project',ProjectController::class);

    Route::resource('category',CategoryController::class);
    Route::resource('product',ProductController::class);

    Route::post('element', [DisplayEditorController::class,'store'])->name('element.store');
    Route::get('element', [DisplayEditorController::class,'index'])->name('element.index');
    Route::post('element/update/{id}', [DisplayEditorController::class,'update'])->name('element.update');


    Route::post('element/sectionone', [DisplayEditorController::class,'storeSectionOne'])->name('element.storeSectionOne');
    Route::get('sectionone', [DisplayEditorController::class,'indexSectionOne'])->name('element.indexSectionOne');
    Route::post('element/sectionone/update', [DisplayEditorController::class,'updateSectionOne'])->name('element.updateSectionOne');

    Route::post('element/sectiontwo', [DisplayEditorController::class,'storeSectionTwo'])->name('element.storeSectionTwo');
    Route::get('element/sectiontwo', [DisplayEditorController::class,'indexSectionTwo'])->name('element.indexSectionTwo');
    Route::post('element/sectiontwo/update', [DisplayEditorController::class,'updateSectionTwo'])->name('element.updateSectionTwo');


    Route::get('order-completed',[OrderController::class,'indexComplete'])->name('order.complete');
    Route::get('orders',[OrderController::class,'index'])->name('orders');
    Route::get('order-pending',[OrderController::class,'indexPending'])->name('order.pending');
    Route::get('order-cancel',[OrderController::class,'indexDeclined'])->name('order.cancel');
    Route::get('order-show/{id}',[OrderController::class,'show'])->name('order.show');


    Route::post('order-delete/{id}',[OrderController::class,'destroy'])->name('order.delete');

    Route::post('order-complete/{id}',[OrderController::class,'statusComplete'])->name('order.statuscomplete');
    Route::post('order-consle/{id}',[OrderController::class,'statusConsle'])->name('order.statusconsle');

    Route::get('orders/customer/{id}',[OrderController::class,'indexOrdersUser'])->name('orders.user');


});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
