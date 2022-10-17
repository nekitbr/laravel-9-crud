<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\IBGEController;

Route::view('/', 'dashboard');
Route::view('/products/new', 'products.create')->name('products.create');

Route::get('/products', [ProductController::class, 'list'])->name('products.list');
route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
route::get('/products/{id}/files', [ProductController::class, 'getFiles']);
Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::patch('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.delete');

Route::get('/pdf/products/{id}', [PDFController::class, 'generateSinglePDF'])->name('products.single.pdf');
Route::get('/pdf/products', [PDFController::class, 'generateMultiPDF'])->name('products.multi.pdf');

Route::delete('/files/{id}', [FileController::class, 'destroy'])->name('file.delete');

Route::get('/external/ibge/{id}', [IBGEController::class, 'show'])->name('external.ibge.show');
Route::get('/external/ibge', [IBGEController::class, 'list'])->name('external.ibge.list');
