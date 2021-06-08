<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class product extends Model
{
    //
    protected $table = 'product';
    protected $fillable = ['product_code', 'name', 'discount', 'sex', 'price', 'color_id', 'category_id', 'status', 'description', 'image'];

    public function img()
    {
        return $this->hasMany(image::class, 'product_id', 'id')->getFirst();
    }
    public function cate()
    {
        return $this->hasOne(category::class, 'id', 'category_id');
    }
    public function prodDs()
    {
        return $this->hasMany(productDetail::class, 'product_id', 'id');
    }
    public function color()
    {
        return $this->hasOne(color::class, 'id', 'color_id');
    }
    // public function wishlist($query)
    // {
    //     return $this->belongsToMany(User::class, 'wishlist', 'product_id', 'user_id');
    // }
    public function scopeWishlist($query, $id)
    {
        $item = $query
            ->join('wish', 'product.id', '=', $id)
            ->join('users', 'users.id', '=', 'wishlist' . 'wishlist.user_id')
            ->where([['wishlist.product_id', '=', $id], ['wishlist.user_id', '=', Auth::user()->id]])
            ->get();
        return $item;
    }
    // public function scopeGetAttr($query, $attr, $id)
    // {
    //     $attrRs = $query
    //         ->join('product_image', 'product_image.product_id', '=', 'product.id')
    //         ->join($attr, $attr . '.id', '=', 'product_image.' . $attr . '_id')
    //         ->where('product_image.product_id', '=', $id)
    //         ->get();
    //     return $attrRs;
    // }
    public function scopeProdSale($query)
    {
        # code...
        $query = $query->where('discount', '>', '0')->orderBy('discount', 'DESC')->get();
        return $query;
    }
    public function scopeThem()
    {
        # code...
        $img_name = '';
        if (request()->has('image')) {
            # code...
            $img_name = request()->image->getClientOriginalName();
            request()->image->move(public_path('uploads/prods'), $img_name);
        }
        $add = $this->create([
            'product_code' => request()->product_code,
            'name' => request()->name,
            'sex' => request()->sex,
            'price' => request()->price,
            'discount' => request()->discount,
            'status' => request()->status,
            'category_id' => request()->category_id,
            'description' => request()->description,
            'color_id' => request()->color_id,
            'image' => $img_name,
        ]);
        return $add;
    }
    public function scopeSold($query, $id)
    {
        $query = $query->find($id);
        $sold_count = $query->sold_count++;
        $query = $query->update([
            'sold_count' => $sold_count,
        ]);
        return $query;
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
            'product_code' => request()->product_code,
            'name' => request()->name,
            'price' => request()->price,
            'sex' => request()->sex,
            'discount' => request()->discount,
            'status' => request()->status,
            'category_id' => request()->category_id,
            'description' => request()->description,
            'color_id' => request()->color_id,
            'image' => $img_name,
        ]);

        return $query;
    }
    public function scopeXoa($query, $id)
    {
        # code...
        $query = $query->find($id);
        if ($n = $query->prodDs->count() > 0) {
            # code...
            return $n;
        }
        $query->delete();
        return 0;
    }

    public function scopeSearch($query)
    {
        if (request()->search_str) {
            $search = request()->search_str;
            $query = $query->where('name', 'like', '%' . $search . '%');
        }
        if (request()->from && request()->to) {
            $from = request()->from;
            $to = request()->to;
            if ((int)$from < (int)$to) {
                $query = $query->whereBetween('price', [(int)$from, (int)$to]);
            }
        }
        if (request()->search_str && request()->from && request()->to) {
            $from = request()->from;
            $to = request()->to;
            $search = request()->search_str;
            $query = $query->where('name', 'like', '%' . $search . '%');
            if ((int)$from < (int)$to) {
                $query = $query->whereBetween('price', [(int)$from, (int)$to]);
            }
        }
        return $query;
    }
}
