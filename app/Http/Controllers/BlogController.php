<?php

namespace App\Http\Controllers;

use App\articleCommentReply;
use App\Models\articleComment;
use App\Models\news;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = news::orderBy('id', 'DESC')->get();
        return view('blog', compact('blogs'));
    }
    public function detail($id, $slug)
    {
        $comments = articleComment::orderBy('id', 'DESC')->where('article_id', $id)->get();
        $blogs = news::orderBy('id', 'DESC')->get();
        $blog = news::find($id);
        $blogNext = news::where('id', '>', $id)->min('id');
        $blogPrevious = news::where('id', '<', $id)->max('id');
        $blogNext = news::find($blogNext);
        $blogPrevious = news::find($blogPrevious);
        if (!$blogNext) {
            $blogNext = news::where('id', '>', 0)->min('id');
            $blogNext = news::find($blogNext);
            return view('blogDetail', compact('blogs', 'blog', 'blogNext', 'blogPrevious', 'comments'));
        }
        if (!$blogPrevious) {
            $blogPrevious = news::where('id', '>', 0)->max('id');
            $blogPrevious = news::find($blogPrevious);
            return view('blogDetail', compact('blogs', 'blog', 'blogNext', 'blogPrevious', 'comments'));
        }
        return view('blogDetail', compact('blogs', 'blog', 'blogNext', 'blogPrevious', 'comments'));
    }
    public function comment($id, $user_id)
    {
        $add = articleComment::them($id, $user_id);
        return redirect()->back();
    }
    public function comment_del($id)
    {
        $del = articleComment::xoa($id);
        return redirect()->back();
    }
    public function comment_rep($id, $user_id)
    {
        $add = articleCommentReply::them($id, $user_id);
        return redirect()->back();
    }
    public function comment_rep_del($id)
    {
        $del = articleCommentReply::xoa($id);
        return redirect()->back();
    }
    // public function blog_write()
    // {
    //     return view('blogCreate');
    // }
    // public function blog_write_p(Request $request)
    // {
    //     $add = news::them();
    //     if ($add) {
    //         return redirect()->route('admin.news')->with('success', 'Thêm mới thành công!');
    //     }
    //     return redirect()->route('admin.news')->with('error', 'Thêm mới thất bại');
    // }
    // public function blog_write_content(Request $request)
    // {
    //     return view('blogCreateContent');
    // }
    // public function blog_write_content_p(Request $request)
    // {
    //     $add = news::them();
    //     if ($add) {
    //         return redirect()->route('admin.news')->with('success', 'Thêm mới thành công!');
    //     }
    //     return redirect()->route('admin.news')->with('error', 'Thêm mới thất bại');
    // }
}
