<?php

use App\Http\Controllers\AddTaskController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\EditController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/', function() {
//     return view('welcome');
// })->name('home');


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
// ->name('verification.notice');

Route::get('/', function() {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');

    
});

Route::middleware('auth')->group(function () {
    
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->name('password.confirm');
    
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
    
    // Route::get('profile', function () {
        Route::middleware('verified')->group(function() {
            Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
    
            Route::get('add-task', [AddTaskController::class, 'index']);
            Route::post('add-task', [AddTaskController::class, 'add']);
    
            Route::get('detail', [DetailController::class, 'index']);
    
            Route::get('edit', [EditController::class, 'index']);
            Route::post('edit', [EditController::class, 'edit']);
    
            Route::get('del', [DeleteController::class, 'index']);
        });
    // })->middleware('verified');
});
