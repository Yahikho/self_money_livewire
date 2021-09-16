<?php

use App\Http\Livewire\Ingreso;
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

    Route::get('/',ShowHome::class)->name('render.show');
    Route::get('tipo-ingresos', TipoIngreso::class)->name('tipo-ingresos');
    Route::get('tipo-egresos', TipoEgreso::class)->name('tipo-egresos');
    Route::get('ingresos', Ingreso::class)->name('ingresos');

});