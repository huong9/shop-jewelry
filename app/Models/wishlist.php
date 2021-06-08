<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class wishlist extends Model
{
    public $timestamps = false;
    protected $table = 'wish_list';
    protected $fillable = ['product_id', 'user_id'];

    public function scopeWishListPro($query)
    {
        $item = $query
            ->join('product', 'product.id', '=', 'product_id')
            ->where('user_id', '=', Auth::user()->id)
            ->select('product.name')
            ->get();
        return $item;
    }

    public function prod()
    {
        return $this->hasOne(product::class, 'id', 'product_id');
    }

    public function scopeThem($query, $id)
    {
        $add = 1;
        $exist = $query->where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        if (!$exist) {
            $add = $this->create([
                'product_id' => $id,
                'user_id' => Auth::user()->id,
            ]);
        }
        return $id;
    }
    public function scopeXoa($query, $id)
    {
        $query = $query->find($id);
        $query->delete();
        return 0;
    }
    public function scopeXoaApi($query, $id)
    {
        $query = $query
            ->where([
                ['product_id', '=', $id],
                ['user_id', '=', Auth::user()->id]
            ])
            ->delete();
        return 0;
    }
}
