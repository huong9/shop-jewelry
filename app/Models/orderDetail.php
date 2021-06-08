<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    //
    protected $table = 'order_detail';
    protected $fillable = ['size', 'order_id', 'product_id', 'quantity', 'price'];

    public function user()
    {
        return $this->hasMany(productDetail::class, 'size_id', 'id');
    }

    public function scopeThem($query, $order_id, $prod_id, $quantity, $price, $size)
    {
        # code...
        $add = $this->create([
            'order_id' => $order_id,
            'product_id' => $prod_id,
            'quantity' => $quantity,
            'price' => $price,
            'size' => $size
        ]);

        return $add;
    }
    public function scopeSua($query, $id)
    {
        $query = $query->find($id);
        # code...
        $query = $query->update(request()->all());
        return $query;
    }
    public function scopeXoa($query, $id)
    {
        # code...
        $query = $query->find($id);
        $query->delete();
        return $query;
    }
}
