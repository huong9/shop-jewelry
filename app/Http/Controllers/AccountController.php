<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view('account');
    }
    public function address()
    {
        return view('address');
    }
    public function u_address(Request $request)
    {
        $id = Auth::user()->id;
        $edit = User::editAddress($id);
        if ($edit) {
            # code...
            return redirect()->route('account')->with('success', 'Successfully!');
        }
        return redirect()->route('account')->with('error', 'Failed');
    }
    public function order_cancel($id)
    {
        $xoa = Order::userXoa($id);
        if ($xoa) {
            return redirect()->back()->with('success', 'Successfully!');
        }
        return redirect()->back()->with('error', 'Failed');
    }
}
