<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    //
    protected $table = 'image';
    protected $fillable = ['product_id', 'product_detail_id', 'image'];

    public function prod()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function prodD()
    {
        return $this->hasOne(productDetail::class, 'id', 'product_detail_id');
    }

    public function scopeAdd()
    {
        $img_name = '';
        if (request()->has('image')) {
            # code...
            $img_name = request()->image->getClientOriginalName();
            request()->image->move(public_path('uploads'), $img_name);
        }
        $add = $this->create([
            'product_id' => request()->product_id,
            'product_detail_id' => request()->product_detail_id,
            'image' => $img_name,
        ]);

        return $add;
    }
    public function scopeSua($query, $id)
    {
        $query = $query->find($id);
        $img_name = '';
        if (request()->has('image')) {
            # code...
            $img_name = request()->image->getClientOriginalName();
            request()->image->move(public_path('uploads'), $img_name);
        }
        $query = $query->update([
            'product_id' => request()->product_id,
            'product_detail_id' => request()->product_detail_id,
            'image' => $img_name,
        ]);

        return $query;
    }
}
