<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomController;
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
    return view('welcome');
});

Route::get('/greeting', function () {
    return view('home');
})->name('zarzuf');
Route::get('/user/{id}', function (string $id) {
    return 'Utente è '.$id;
});
Route::get('/chi-siamo', [CustomController::class, 'chiSiamo'])->name('chiSiamo');
