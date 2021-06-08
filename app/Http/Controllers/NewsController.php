<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = news::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function p_create(Request $request)
    {
        $add = news::them();
        if ($add) {
            return redirect()->route('admin.news')->with('success', 'Success!');
        }
        return redirect()->route('admin.news')->with('error', 'Failure!');
    }
    public function edit($id)
    {
        $new = news::find($id);
        return view('admin.news.edit', compact('new'));
    }
    public function p_edit($id, Request $request)
    {
        $sua = news::sua($id);
        if ($sua) {
            return redirect()->route('admin.news')->with('success', 'Success!');
        }
        return redirect()->route('admin.news')->with('error', 'Failure!');
    }
    public function delete($id)
    {
        $xoa = news::xoa($id);
        if ($xoa > 0) {
            return redirect()->route('admin.news')->with('error', 'Success!');
        }
        return redirect()->route('admin.news')->with('success', 'Failure!');
    }
}
