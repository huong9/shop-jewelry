<?php

namespace App\Models;

class cart
{
    public $items = [];
    public $totalItems = 0;
    public $totalPrice = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->total_price = $this->get_total_price();
        $this->countItems = count($this->items);
        $this->total_quantity = $this->get_total_quantity();
    }
    public function addItem($prod, $quantity = 1, $color, $size)
    {
        if (isset($this->items[$prod->id])) {
            $this->items[$prod->id]['quantity'] += $quantity;
            $this->items[$prod->id]['color'] = $color;
            $this->items[$prod->id]['size'] = $size;
        } else {
            $priceFinal = $prod->price - (($prod->price * $prod->discount) / 100);
            $item = [
                'id' => $prod->id,
                'image' => $prod->image,
                'name' => $prod->name,
                'price' => $priceFinal,
                'quantity' => $quantity,
                'color' => $color,
                'size' => $size,
                'sold_count' => $prod->sold_count
            ];
            $this->items[$prod->id] = $item;
        }


        session(['cart' => $this->items]);
        // dd($this->items);
    }
    public function updateItem($quantity)
    {
        // dd($quantity, $this->items);
        foreach ($quantity as $id => $value) {
            foreach ($this->items as $value2) {
                if (isset($this->items[$id]) && $id == $value2['id']) {
                    $this->items[$id]['quantity'] = $value > 0 ? ceil((int)$value) : 1;
                }
            }
        }
        session(['cart' => $this->items]);
    }
    public function removeItem($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
            session(['cart' => $this->items]);
        }
    }
    public function removeAll()
    {
        session(['cart' => []]);
    }
    private function get_total_price()
    {
        $t = 0;
        foreach ($this->items as $item) {
            $t += $item['price'] * $item['quantity'];
        }
        return $t;
    }
    private function get_total_quantity()
    {
        $t = 0;
        foreach ($this->items as $item) {
            $t += $item['quantity'];
        }
        return $t;
    }
}
