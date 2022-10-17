<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PDF;

class PDFController extends Controller
{
    public function generateSinglePDF(string $id) {
        $product = Product::with('files')->findOrFail($id);

        $data = [
            'products' => [$product]
        ];

        $pdf = PDF::loadView('products.pdf.base', $data);

        return $pdf->download($product->name . '.pdf');
    }

    public function generateMultiPDF() {
        $products = Product::with('files')->get();

        $data = [
            'products' => $products
        ];

        $pdf = PDF::loadView('products.pdf.base', $data);

        return $pdf->download('products.pdf');
    }
}
