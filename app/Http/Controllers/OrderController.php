<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }

    public function create()
    {
        return view('admin.order.create');
    }

    public function p_create(Request $request)
    {
        $add = Order::them();
        if ($add) {
            return redirect()->route('admin.order')->with('success', 'Success!');
        }
        return redirect()->route('admin.order')->with('error', 'Failure!');
    }
    public function edit($id)
    {
        $order = Order::find($id);
        return view('admin.order.edit', compact('order'));
    }
    public function p_edit($id, Request $request)
    {
        $sua = Order::sua($id);
        if ($sua) {
            # code...
            return redirect()->route('admin.order')->with('success', 'Success!');
        }
        return redirect()->route('admin.order')->with('error', 'Failure!');
    }
    public function delete($id)
    {
        $xoa = Order::xoa($id);
        if ($xoa > 0) {
            return redirect()->route('admin.order')->with('error', 'Failure!');
        }
        return redirect()->route('admin.order')->with('success', 'Success!');
    }
}
