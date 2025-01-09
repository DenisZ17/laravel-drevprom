<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');


Route::get('/shipment/create', [ShipmentController::class, 'create'])->name('shipment.create');
Route::post('/', [ShipmentController::class, 'store'])->name('shipment.store');
Route::get('/shipment/{shipment}/edit', [ShipmentController::class, 'edit'])->name('shipment.edit');
Route::put('/shipment/{shipment}/update', [ShipmentController::class, 'update'])->name('shipment.update');
Route::delete('/shipment/{shipment}/destroy', [ShipmentController::class, 'destroy'])->name('shipment.destroy');

Route::get('/knowledge', KnowledgeController::class)->name('knowledge');

Route::get('/detail/create', [DetailController::class, 'create'])->name('detail.create');
Route::post('/detail', [DetailController::class, 'store'])->name('detail.store');
Route::get('detail/{detail}/edit', [DetailController::class, 'edit'])->name('detail.edit');
Route::put('/detail/{detail}/update', [DetailController::class, 'update'])->name('detail.update');
Route::delete('/detail/{detail}/destroy', [DetailController::class, 'destroy'])->name('detail.destroy');

Route::get('/dashboard', DashboardController::class)->name('dashboard');
;
