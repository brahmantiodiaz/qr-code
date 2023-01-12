<?php

use App\Http\Controllers\QrController;
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

Route::get('qr_code/index', [QrController::class, 'index'])->name('qrcode.index');
Route::get('qr_code/create', [QrController::class, 'create'])->name('qrcode.create');
Route::get('/qrqr', function () {
    return view('welcome');
});
