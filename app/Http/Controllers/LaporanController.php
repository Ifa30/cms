<?php

namespace App\Http\Controllers;

use App\Models\Product;

class LaporanController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('laporan.index', compact('products'));
    }
}

