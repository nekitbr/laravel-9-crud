<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\File;
use App\Http\Controllers\BarcodeController;

use Illuminate\Support\Facades\Schema;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class FileController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function destroy(string $id) {
        Product::delete($id);

        return back()->with('msg', 'Arquivo deletado com sucesso!');
    }
}
