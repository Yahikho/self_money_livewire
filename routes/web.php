<?php

use App\Http\Livewire\ShowHome;
use App\Http\Livewire\TipoEgreso;
use App\Http\Livewire\TipoIngreso;
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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/', [ShowHome::class, 'show'])->name('data.show');
    Route::get('tipo-ingreso', [TipoIngreso::class, 'show'])->name('show.tipo-ingreso');
    Route::get('tipo-egreso', [TipoEgreso::class, 'show'])->name('show.tipo-egreso');

});