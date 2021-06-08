<?php

namespace App\Http\Controllers;

use App\Http\Requests\Image\ImgRequest;
use App\Models\image;
use App\Models\product;

class ImgController extends Controller
{
    //
    public function index()
    {
        $prods = product::all();
        $imgs = image::all();
        return view('admin.img.index', compact('imgs', 'prods'));
    }

    public function create()
    {
        $prods = product::all();
        return view('admin.img.create', compact('prods'));
    }

    public function p_create(ImgRequest $rq)
    {
        $add = image::add();
        if ($add) {
            return redirect()->route('admin.image')->with('success', 'Thêm mới thành công!');
        }
        return redirect()->route('admin.image')->with('error', 'Thêm mới thất bại');
    }
    public function edit($id)
    {
        $prods = product::all();
        $img = image::find($id);
        return view('admin.img.edit', compact('img', 'prods'));
    }
    public function p_edit($id, ImgRequest $rq)
    {

        $img = image::sua($id);
        if ($img) {
            return redirect()->route('admin.image')->with('success', 'Sửa đổi thành công!');
        }
        return redirect()->route('admin.image')->with('error', 'Sửa đổi thất bại');
    }
    public function delete($id)
    {
        image::destroy($id);
        return redirect()->route('admin.image')->with('success', 'Xoá thành công!');
    }
}
