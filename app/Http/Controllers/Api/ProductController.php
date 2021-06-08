<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\color;
use App\Models\product;
use App\Models\productDetail;
use App\Models\size;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $prods = product::all();
        return response($prods);
    }

    public function getOne($id)
    {
        $prod = product::find($id);
        return response($prod);
        # code...
    }
    public function getOneDt($id)
    {
        $prods = product::find($id)->prodDs()->get();
        return response($prods);
        # code...
    }
    public function getColor($id)
    {
        $color = color::find($id);
        return response($color);
        # code...
    }
    public function getSize($id)
    {
        $size = size::find($id);
        return response($size);
        # code...
    }
    public function getProd()
    {
        # code...
        $prodHighest = product::orderBy('price', 'DESC')->first();
        return response($prodHighest);
    }
}
