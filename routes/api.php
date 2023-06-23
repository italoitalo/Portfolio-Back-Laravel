<?php

use App\Http\Controllers\IndicacoesController;
use App\Http\Controllers\StatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/index', [IndicacoesController::class, 'index'])->name('api.index');
Route::post('/store', [IndicacoesController::class, 'store'])->name('api.store');
Route::get('/edit/{id}', [IndicacoesController::class, 'edit'])->name('api.edit');
Route::delete('/delete/{id}', [IndicacoesController::class, 'destroy'])->name('api.destroy');
Route::put('/update/{id}', [IndicacoesController::class, 'update'])->name('api.update');
Route::post('/indicacoes/adicionar-valor/{id}', [IndicacoesController::class, 'adicionarValor'])->name('api.adicionarValor');

Route::get('/indexStatus', [StatusController::class, 'index'])->name('api.indexStatus');
Route::post('/storeStatus', [StatusController::class, 'store'])->name('api.storeStatus');
Route::get('/editStatus/{id}', [StatusController::class, 'edit'])->name('api.editStatus');
Route::delete('/deleteStatus/{id}', [StatusController::class, 'destroy'])->name('api.destroyStatus');
Route::put('/updateStatus/{id}', [StatusController::class, 'update'])->name('api.updateStatus');
