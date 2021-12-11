<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;


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


// General Routes

Route::group(['prefix' => 'app/u/', 'middleware' => 'auth', 'verified'], function() {
    Route::get('dashboard', [LoginController::class, 'dashboard'])->name('retailer.dashboard');
    Route::get('metros/{slug}', [LoginController::class, 'dashboard_metro'])->name('retailer.dashboard.metro');
    Route::get('products/{slug}/{metro_slug}', [LoginController::class, 'dashboard_product'])->name('retailer.dashboard.product');
    Route::get('p/{slug}/{metro_slug}/{business_slug}', [LoginController::class, 'dashboard_product_info'])->name('retailer.product.info');

});



//User B
Route::group(['prefix' => 'app/b/', 'middleware' => 'auth', 'verified'], function() {
    Route::get('dashboard', [\App\Http\Controllers\BusinessController::class, 'dashboard'])->name('business.dashboard');
    Route::get('metros/{slug}', [\App\Http\Controllers\BusinessController::class, 'dashboard_metro'])->name('business.dashboard.metro');
    Route::get('p/{slug}/{metro_slug}', [\App\Http\Controllers\BusinessController::class, 'dashboard_product_info'])->name('business.product.info');
    Route::get('place-order/{metro_slug}/{product_slug}', [\App\Http\Controllers\BusinessController::class, 'place_order'])->name('business.place.order');
    Route::post('placeorder', [\App\Http\Controllers\BusinessController::class, 'place_order_post'])->name('business.place.order.post');


});

