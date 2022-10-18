<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\File;
use App\Http\Controllers\BarcodeController;

use Illuminate\Support\Facades\Schema;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $filterFields = [
        'id' => true,
        'barcode' => true,
        'name' => true,
        'description' => true,
        'quantity' => true,
        'created_at' => true,
        'updated_at' => false,
    ];

    public function store(Request $request) {
        $newProduct = Product::create($request->all());
    
        $barcodeController = new BarcodeController($newProduct->getKey());

        $newProduct->barcode = $barcodeController->generateEAN13();
        $newProduct->save();

        $files = $request->file('images');

        $newFiles = [];
        foreach($files ?? [] as $file) {
            $name = $file->getClientOriginalName();
            $size = $file->getSize();
            $mimeType = $file->getMimeType();
            $path = $file->store('uploads');

            $newFile = File::create([
                'name' => $name,
                'path' => $path,
                'byteSize' => $size,
                'product_id' => $newProduct->getKey(),
                'mimeType' => $mimeType,
            ]);

            array_push($newFiles, $newFile);
        }

        $newProduct->files = $newFiles;

        $data = [
            'product' => $newProduct
        ];

        return view('products.show', $data)->with('msg', 'Produto criado com sucesso!');
    }

    public function show(string $id) {
        $product = Product::findOrFail($id);

        $data = [
            'product' => $product,
        ];

        return view('products.show', $data);
    }

    public function list(Request $request) {
        $filter = array_filter($request->query(), fn($value, $key) => ($this->filterFields[$key] ?? false) && $value != '', ARRAY_FILTER_USE_BOTH);

        $products = Product::where($filter)->get();

        $data = [
            'products' => $products
        ];

        return view('products.list', $data);
    }

    public function listAPI(Request $request) {
        $filter = array_filter($request->query(), fn($value, $key) => ($this->filterFields[$key] ?? false) && $value != '', ARRAY_FILTER_USE_BOTH);

        $products = Product::where($filter)->get();

        return $products;
    }

    public function getFiles(Request $request, string $id) {
        $product = Product::findOrFail($id);
    
        return $product->files;
    }

    public function edit(Request $request, string $id) {
        $product = Product::findOrFail($id);

        $data = [
            'product' => $product,
        ];

        return view('products.edit', $data);
    }

    public function update(Request $request, string $id) {
        $newProduct = Product::findOrFail($id)->update($request->all());

        $files = $request->file('images');

        foreach($files ?? [] as $file) {
            $name = $file->getClientOriginalName();
            $size = $file->getSize();
            $mimeType = $file->getMimeType();
            $path = $file->store('uploads');

            $newFile = File::create([
                'name' => $name,
                'path' => $path,
                'byteSize' => $size,
                'product_id' => $id,
                'mimeType' => $mimeType,
            ]);
        }

        return back()->with('msg', 'Produto editado com sucesso!');
    }

    public function destroy(Request $request, string $id) {
        $deletedProduct = Product::findOrFail($id)->delete();
    
        return back()->with('mds', 'Produto deletado com sucesso!');
    }
}
