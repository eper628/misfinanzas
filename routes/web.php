<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountSettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TransferController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::get('/report/out', [ReportController::class, 'out'])->name('report.out');
Route::get('/report/add', [ReportController::class, 'add'])->name('report.add');
Route::get('/report/balance', [ReportController::class, 'balance'])->name('report.balance');

Route::resource('account', AccountController::class)->names('account');
Route::resource('category', CategoryController::class)->names('category');
Route::resource('subcategory', SubcategoryController::class)->names('subcategory');
Route::resource('record', RecordController::class)->names('record');

Route::get('/transfer', [TransferController::class, 'index'])->name('transfer.index');
Route::get('/transfer/create', [TransferController::class, 'create'])->name('transfer.create');
Route::post('/transfer/store', [TransferController::class, 'store'])->name('transfer.store');
Route::get('/transfer/{record}/edit', [TransferController::class, 'edit'])->name('transfer.edit');
Route::put('/transfer/{record}', [TransferController::class, 'update'])->name('transfer.update');
Route::delete('/transfer/{record}', [TransferController::class, 'destroy'])->name('transfer.destroy');

Route::get('/account-setting', [AccountSettingController::class, 'index'])->name('account-setting.index');
Route::get('/account-setting/create', [AccountSettingController::class, 'create'])->name('account-setting.create');
Route::post('/account-setting/store', [AccountSettingController::class, 'store'])->name('account-setting.store');
Route::get('/account-setting/{record}/edit', [AccountSettingController::class, 'edit'])->name('account-setting.edit');
Route::put('/account-setting/{record}', [AccountSettingController::class, 'update'])->name('account-setting.update');
Route::delete('/account-setting/{record}', [AccountSettingController::class, 'destroy'])->name('account-setting.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
