<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class Products extends Controller
{
    public function index() {
        return view('product.index')->with('products', Product::all());
    }

    public function create() {
        return view('product.create');
    }

    public function store(Request $request) {
        Product::create($request->all());
        return redirect(route('product.index'));
    }
}
