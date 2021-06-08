<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productDetail extends Model
{
    //
    protected $table = 'product_image';
    protected $fillable = ['product_id', 'image', 'status'];

    public function prod()
    {
        return $this->hasOne(product::class, 'id', 'product_id');
    }



    public function scopeAdd()
    {
        $img_name = '';
        if (request()->has('image')) {
            # code...
            $img_name = request()->image->getClientOriginalName();
            request()->image->move(public_path('uploads/prods'), $img_name);
        }
        $add = $this->create([
            'product_id' => request()->product_id,
            'status' => request()->status,
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
            request()->image->move(public_path('uploads/prods'), $img_name);
        }
        $query = $query->update([
            'product_id' => request()->product_id,
            'status' => request()->status,
            'image' => $img_name,
        ]);

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
