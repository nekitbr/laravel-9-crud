<?php

namespace App\Http\Controllers;

use App\Models\File;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;

use Illuminate\Routing\Controller as BaseController;

class FileController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function download(string $id) {
        $file = File::find($id);

        $headers = [
            'Content-Type' => $file->mimeType,
        ];

        return Storage::download($file->path, $file->name, $headers);
    }
}
