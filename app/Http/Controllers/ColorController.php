<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Models\color;
use App\Models\product;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = color::all();
        return view('admin.color.index', compact('colors'));
    }

    public function create()
    {
        $prods = product::all();
        return view('admin.color.create', compact('prods'));
    }

    public function p_create(ColorRequest $request)
    {
        $add = color::them();
        if ($add) {
            return redirect()->route('admin.color')->with('success', 'Success!');
        }
        return redirect()->route('admin.color')->with('error', 'Failure');
    }
    public function edit($id)
    {
        $prods = product::all();
        $color = color::find($id);
        return view('admin.color.edit', compact('color'));
    }
    public function p_edit($id, Request $request)
    {
        $sua = color::sua($id);
        if ($sua) {
            # code...
            return redirect()->route('admin.color')->with('success', 'Success!');
        }
        return redirect()->route('admin.color')->with('error', ' ');
    }
    public function delete($id)
    {
        $xoa = color::xoa($id);
        if ($xoa > 0) {
            return redirect()->route('admin.color')->with('error', 'Success!');
        }
        return redirect()->route('admin.color')->with('success', 'Failure!');
    }
}
