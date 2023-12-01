<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Accounts\Login;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\User\EnergyController;
use App\Http\Controllers\Admin\ParkingController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\TransportationController;

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

Route::get('/', [Login::class, 'register'])->name('account.register');

Route::get('/auth/login', [Login::class, 'index'])->name('account.login');
Route::post('/auth/user/login', [Login::class, 'login2'])->name('login.user');

Route::get('/auth/login_verification', [Login::class, 'verificationCode'])->name('account.verificationCode');
Route::post('/auth/login_verification/verify', [Login::class, 'verify_code'])->name('account.verify_code');

Route::get('/auth/logout', [Login::class, 'logout'])->name('account.logout');

Route::get('/auth/forgot_password', [Login::class, 'forgotPassword'])->name('account.forgotPassword');
Route::post('/auth/forgot_password/send_password_reset_link', [Login::class, 'sendResetPasswordLink'])->name('account.sendResetPasswordLink');
Route::get('/auth/reset_password/{token}', [Login::class, 'resetPassword'])->name('password.reset');
Route::post('/auth/reset_password/password/update', [Login::class, 'updatePassword'])->name('password.change');

Route::post('/auth/user/register', [Login::class, 'registerUser'])->name('account.registerUser');

// /Route::get('admin/dashboard/', [AdminDashboard::class, 'index'])->name('admin.dashboard');

//  Admin Dashboard Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');

    Route::get('/users', [AdminDashboard::class, 'user'])->name('admin.users');
    Route::get('/users/view/{user}', [AdminDashboard::class, 'viewUser'])->name('admin.viewUser');

    Route::get('/parking_locations', [ParkingController::class, 'index'])->name('admin.parkinglocations');
    Route::post('/parking_locations', [ParkingController::class, 'store'])->name('admin.parkinglocations.store');
    Route::get('/parking_locations/{parkingLocation}/edit', [ParkingController::class, 'edit'])->name('admin.parkinglocations.edit');
    Route::put('/parking_locations/{parkingLocation}', [ParkingController::class, 'update'])->name('admin.parkinglocations.update');
    Route::delete('/parking_locations/delete/{parkingLocation}', [ParkingController::class, 'delete'])->name('admin.parkinglocations.destroy');

});

//  Agent Dashboard Routes
Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::post('/predict/parking', [UserDashboardController::class, 'predict'])->name('predict.parking');


});
