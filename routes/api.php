<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\File;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Storage;

Route::get('/file/{id}', function(Request $request, string $id) {
    $file = File::find($id);

    $headers = [
        'Content-Type' => $file->mimeType,
    ];

    return Storage::download($file->path, $file->name, $headers);
})->name('file.download');