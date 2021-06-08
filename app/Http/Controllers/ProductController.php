<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductRequest;
use App\Models\category;
use App\Models\color;
use App\Models\product;

class ProductController extends Controller
{
    public function index()
    {
        $colors = color::all();
        $cates = category::all();
        $prods = product::all();
        return view('admin.product.index', compact('prods', 'cates', 'colors'));
    }

    public function create()
    {
        $colors = color::all();
        $cates = Category::all();

        return view('admin.product.create', compact('cates', 'colors'));
    }

    public function p_create(ProductRequest $request)
    {
        $add = product::them();
        if ($add) {
            return redirect()->route('admin.product')->with('success', 'Success!');
        }
        return redirect()->route('admin.product')->with('error', 'Failure!');
    }
    public function edit($id)
    {
        $colors = color::all();
        $cates = category::all();
        $prod = product::find($id);
        return view('admin.product.edit', compact('prod', 'cates', 'colors'));
    }
    public function p_edit($id, ProductRequest $request)
    {
        $sua = product::sua($id);
        if ($sua) {
            return redirect()->route('admin.product')->with('success', 'Success!');
        }
        return redirect()->route('admin.product')->with('error', 'Failure!');
    }
    public function delete($id)
    {
        $xoa = product::xoa($id);
        if ($xoa > 0) {
            return redirect()->route('admin.product')->with('error', 'Failure!');
        }
        return redirect()->route('admin.product')->with('success', 'Success!');
    }
}
