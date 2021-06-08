<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(cart $cart)
    {
        $id = request('id');
        $quantity = request('quantity');
        $color = request('color');
        $size = request('size');
        $product = product::find($id);
        if ($product) {
            $cart->addItem($product, $quantity, $color, $size);
            return redirect()->back();
        } else {
            return redirect()->route('home');
        }
    }
    public function index()
    {
        return view('cart');
    }
    public function delete($id, Cart $cart)
    {
        $cart->removeItem($id);
        return redirect()->back();
    }
    public function update(Cart $cart)
    {
        $quantity = request()->all();
        $cart->updateItem($quantity);
        return redirect()->route('cart');
    }
    public function deleteAll(Cart $cart)
    {
        $cart->removeAll();
        return redirect()->back();
    }
}
