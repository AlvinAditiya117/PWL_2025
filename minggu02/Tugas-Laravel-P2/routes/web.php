<?php

use App\Http\Controllers\BukuController; // Mengimpor class BukuController agar bisa digunakan dalam route
use Illuminate\Support\Facades\Route; // Mengimpor class Route untuk mendefinisikan route

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

Route::get('/', function () { // Mendefinisikan route untuk path '/' (halaman utama)
    return view('welcome'); // Mengembalikan view 'welcome' (biasanya file blade.php di folder resources/views)
});

Route::resource('bukus', BukuController::class); // Mendefinisikan route resource untuk resource 'bukus' dan dihubungkan ke BukuController