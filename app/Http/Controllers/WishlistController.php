<?php

namespace App\Http\Controllers;

use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function add_wishlist(Request $request)
    {
        $data = $request->id;
        $add = wishlist::them($data);
        return response()->json(['success' => 'Added successfully']);
    }
    public function wishlist()
    {
        return view('wishlist');
    }
    public function wishlist_delete($id)
    {
        $xoa = wishlist::xoa($id);
        if ($xoa > 0) {
            return redirect()->back()->with('error', 'Deleted failed');
        }
        return redirect()->back()->with('success', 'Deleted successfully!');
    }
    public function wishlist_delete_api(Request $request)
    {
        $data = $request->id;
        $xoa = wishlist::xoaApi($data);
        return response()->json(['success' => 'Deleted successfully']);
    }
}
