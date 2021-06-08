<?php

namespace App\Http\Controllers;

use App\Models\newContent;
use App\Models\news;
use Illuminate\Http\Request;

class NewsContentController extends Controller
{
    public function index()
    {
        $newsC = newContent::all();
        return view('admin.newsContent.index', compact('newsC'));
    }

    public function create()
    {
        $news = news::all();
        return view('admin.newsContent.create', compact('news'));
    }

    public function p_create(Request $request)
    {
        $add = newContent::them();
        if ($add) {
            return redirect()->route('admin.newsC')->with('success', 'Success!');
        }
        return redirect()->route('admin.newsC')->with('error', 'Failure!');
    }
    public function edit($id)
    {
        $news = news::all();
        $newC = newContent::find($id);
        return view('admin.newsContent.edit', compact('newC', 'news'));
    }
    public function p_edit($id, Request $request)
    {
        $sua = newContent::sua($id);
        if ($sua) {
            return redirect()->route('admin.newsC')->with('success', 'Success!');
        }
        return redirect()->route('admin.newsC')->with('error', 'Failure!');
    }
    public function delete($id)
    {
        $xoa = newContent::xoa($id);
        if ($xoa) {
            return redirect()->route('admin.newsC')->with('success', 'Success!');
        }
        return redirect()->route('admin.newsC')->with('error', 'Failure!');
    }
}
