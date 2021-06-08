<?php

namespace App\Http\Controllers;

use App\Http\Requests\product\ProductRequest;
use App\Models\productDetail;
use App\Models\color;
use App\Models\product;
use App\Models\size;

class ProductDetailController extends Controller
{
    public function index()
    {

        $prods = product::all();
        $sizes = size::all();
        $prodDs = productDetail::all();
        return view('admin.productDetail.index', compact('prodDs', 'prods', 'sizes'));
    }

    public function create()
    {
        $sizes = size::all();
        $prods = product::all();
        return view('admin.productDetail.create', compact('sizes', 'prods'));
    }

    public function p_create(ProductRequest $request)
    {
        $add = productDetail::add();
        if ($add) {
            return redirect()->route('admin.product_detail')->with('success', 'Success!');
        }
    return redirect()->route('admin.product_detail')->with('error', 'Failure!');
    }
    public function edit($id)
    {
        $sizes = size::all();
        $prods = product::all();
        $prodD = productDetail::find($id);
        return view('admin.productDetail.edit', compact('sizes', 'prods', 'prodD'));
    }
    public function p_edit($id, ProductRequest $request)
    {
        $sua = productDetail::sua($id);
        if ($sua) {
            return redirect()->route('admin.product_detail')->with('success', 'Success!');
        }
        return redirect()->route('admin.product_detail')->with('error', 'Failure!');
    }
    public function delete($id)
    {
        $xoa = productDetail::xoa($id);
        if ($xoa) {
            return redirect()->route('admin.product_detail')->with('success', 'Success!');
        }
        return redirect()->route('admin.product_detail')->with('error', 'Failure!');
    }
}
