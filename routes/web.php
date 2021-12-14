<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

// Static pages

Route::get('/', [\App\Http\Controllers\PagesController::class, 'home'])->name('home');
Route::get('/how-it-works', [\App\Http\Controllers\PagesController::class, 'how_it_works'])->name('howitworks');
Route::get('/benefits', [\App\Http\Controllers\PagesController::class, 'benefits'])->name('benefits');
Route::get('/about-us', [\App\Http\Controllers\PagesController::class, 'about'])->name('about');
Route::get('/pricing', [\App\Http\Controllers\PagesController::class, 'pricing'])->name('pricing');
Route::get('/terms', [\App\Http\Controllers\PagesController::class, 'terms'])->name('terms');
Route::get('/faq', [\App\Http\Controllers\PagesController::class, 'faq'])->name('faq');
Route::get('/faqs/{id}', [\App\Http\Controllers\PagesController::class, 'faqs_info'])->name('faq-info');
Route::get('/contact', [\App\Http\Controllers\PagesController::class, 'contact'])->name('contact');
Route::post('contact/us', [\App\Http\Controllers\PagesController::class, 'sendemailToContact'])->name('contact.us');
Route::get('/subscribe', [\App\Http\Controllers\LoginController::class, 'registration_lead'])->name('subscribe');
Route::post('subscribe/post', [\App\Http\Controllers\LoginController::class, 'customRegistration_lead'])->name('subscribe.post');




// authentications
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('custom-login', [LoginController::class, 'authenticate'])->name('login.custom');
Route::get('signup/{token?}', [LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [LoginController::class, 'logout'])->name('signout');


// email verification routes
Route::get('/email/verify', function () {
    //return view('auth.verify-email');
    return redirect('/signout');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// Forget password

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status), 'msg' => "An email has been sent to you where you can reset your password."])
        : back()->withErrors(['email' => __($status), 'err' => 'Please check your Email ID.']);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');


// User A Routes

Route::group(['prefix' => 'app/u/', 'middleware' => 'auth', 'verified'], function() {
    Route::get('dashboard', [LoginController::class, 'dashboard'])->name('retailer.dashboard');
    Route::get('metros/{slug}', [LoginController::class, 'dashboard_metro'])->name('retailer.dashboard.metro');
    Route::get('products/{slug}/{metro_slug}', [LoginController::class, 'dashboard_product'])->name('retailer.dashboard.product');
    Route::get('p/{slug}/{metro_slug}/{business_slug}', [LoginController::class, 'dashboard_product_info'])->name('retailer.product.info');

    Route::get('inventory/{metro_slug}/{prod_slug}', [\App\Http\Controllers\ProductController::class, 'retailer_inventory'])->name('retailer.inventory');
    Route::get('orders/past/{prod_slug}', [\App\Http\Controllers\ProductController::class, 'retailer_past_orders'])->name('retailer.order.past');
    Route::get('orders/current/{prod_slug}', [\App\Http\Controllers\ProductController::class, 'retailer_current_orders'])->name('retailer.order.current');

    Route::post('delivered', [\App\Http\Controllers\ProductController::class, 'retailer_order_delivered'])->name('retailer.order.delivered');

});



//User B
Route::group(['prefix' => 'app/b/', 'middleware' => 'auth', 'verified'], function() {
    Route::get('dashboard', [\App\Http\Controllers\BusinessController::class, 'dashboard'])->name('business.dashboard');
    Route::get('metros/{slug}', [\App\Http\Controllers\BusinessController::class, 'dashboard_metro'])->name('business.dashboard.metro');
    Route::get('p/{slug}/{metro_slug}', [\App\Http\Controllers\BusinessController::class, 'dashboard_product_info'])->name('business.product.info');
    Route::get('place-order/{metro_slug}/{product_slug}', [\App\Http\Controllers\BusinessController::class, 'place_order'])->name('business.place.order');
    Route::post('placeorder', [\App\Http\Controllers\BusinessController::class, 'place_order_post'])->name('business.place.order.post');
    Route::get('add-product/{metro_slug}', [\App\Http\Controllers\ProductController::class, 'add_product'])->name('business.add.product');
    Route::post('product', [\App\Http\Controllers\ProductController::class, 'product_insert'])->name('business.add.product.post');
    Route::get('orders/current/{prod_slug}', [\App\Http\Controllers\ProductController::class, 'current_orders'])->name('business.order.current');
    Route::get('orders/past/{prod_slug}', [\App\Http\Controllers\ProductController::class, 'past_orders'])->name('business.order.past');

    Route::get('send-inventory/{metro_slug}/{prod_slug}', [\App\Http\Controllers\ProductController::class, 'send_inventory'])->name('business.send.inventory');
    Route::post('inventory-post', [\App\Http\Controllers\ProductController::class, 'send_inventory_insert'])->name('business.send.inventory.post');
    Route::get('inventory/{metro_slug}/{prod_slug}', [\App\Http\Controllers\ProductController::class, 'inventory'])->name('business.inventory');


});

