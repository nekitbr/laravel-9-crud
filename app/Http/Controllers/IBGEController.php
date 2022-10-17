<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Http;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class IBGEController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function destroy(string $id) {
        Product::delete($id);

        return back()->with('msg', 'Arquivo deletado com sucesso!');
    }

    public function list() {
        $items = Http::get('https://servicodados.ibge.gov.br/api/v2/cnae/classes');
    
        $data = [
            'items' => $items->object(),
        ];

        return view('ibge.list', $data);
    }
    
    public function show(string $id) {
        $item = Http::get("https://servicodados.ibge.gov.br/api/v2/cnae/classes/{$id}");
    
        return $data = [
            'items' => $item->json(),
        ];
    
        return view('external.ibge.show', $data);
    }
}
