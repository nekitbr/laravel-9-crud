<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\File;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FileController;

Route::get('/file/{id}', [FileController::class, 'download']);

Route::get('/products', [ProductController::class, 'listAPI']);
