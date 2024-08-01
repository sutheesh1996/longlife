<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/active_users', [DashboardController::class, 'active_users'])->name('active_users');
Route::get('/inactive_users', [DashboardController::class, 'inactive_users'])->name('inactive_users');
Route::resource('users', DashboardController::class);
Route::get('/edit/{id}', [DashboardController::class, 'edit'])->name('users.edit');
Route::put('/edit/{id}', [DashboardController::class, 'update'])->name('users.update');


Route::get('/pay', [PaymentController::class, 'index'])->name('pay');
Route::post('pay', [PaymentController::class, 'pay'])->name('payment');
Route::get('success', [PaymentController::class, 'success']);
Route::get('error', [PaymentController::class, 'error']);
Route::get('/subscription', [DashboardController::class, 'subscription'])->name('subscription');
Route::get('/dashboard/create', [DashboardController::class, 'create'])->name('dashboard.create');
Route::post('/dashboard/store', [DashboardController::class, 'store'])->name('dashboard.store');
Route::get('/users', [DashboardController::class, 'index1'])->name('users');

// Route::get('/device/create', [DashboardController::class, 'createDevice'])->name('create.device');
// Route::post('/device/store', [DashboardController::class, 'storeDevice'])->name('store.device');
// Route::get('/devices', [DashboardController::class, 'listDevices'])->name('list.devices');


// web.php

// Route to show edit form
Route::get('/device/{id}/edit', [DashboardController::class, 'editDevice'])->name('device.edit');

// Route to handle update request
Route::put('/device/{id}', [DashboardController::class, 'updateDevice'])->name('device.update');
// routes/web.php

Route::get('users/{user}/assign-device', [DashboardController::class, 'assignDeviceForm'])->name('users.assign-device-form');
Route::post('users/{user}/assign-device', [DashboardController::class, 'assignDevice'])->name('users.assign-device');

// routes/web.php

Route::get('/users-with-devices', [DashboardController::class, 'usersWithDevices'])->name('users.with-devices');

// routes/web.php

Route::get('/users/{id}/edit-device', [DashboardController::class, 'editDeviceForm'])->name('users.edit-device-form');
Route::post('/users/{id}/update-device', [DashboardController::class, 'updateDevice'])->name('users.update-device');

