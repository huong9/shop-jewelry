<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\color;
use App\Models\product;
use App\Models\productDetail;
use App\Models\size;
use App\Models\wishlist;
use Illuminate\Http\Request;

class WishlistApiController extends Controller
{



    public function add_wishlist(Request $req, wishlist $wl)
    {
        $wl = wishlist::them($req->id);
        return response()->json(['success' => 'Ajax request submitted successfully']);
    }

    public function wishlist_delete($id)
    {
        $xoa = wishlist::xoa($id);
        if ($xoa > 0) {
            return redirect()->back()->with('error', 'Xoá thất bại');
        }
        return redirect()->back()->with('success', 'Xoá thành công!');
    }
}
