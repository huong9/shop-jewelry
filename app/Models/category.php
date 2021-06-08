<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table = 'category';
    protected $fillable = ['name', 'status', 'parent_id', 'priority', 'image', 'slug'];



    public function prods()
    {
        # code...
        return $this->hasMany(product::class, 'category_id', 'id');
    }
    public function prods_est()
    {
        # code...
        return $this->hasMany(product::class, 'category_id', 'id')->orderBy('sold_count', 'DESC');;
    }
    public function scopeThem($query)
    {
        # code...
        $img_name = '';
        if (request()->has('image')) {
            # code...
            $img_name = request()->image->getClientOriginalName();
            request()->image->move(public_path('uploads/cate'), $img_name);
        }
        $add = $this->create([
            'name' => request()->name,
            'status' => request()->status,
            'parent_id' => request()->parent_id,
            'priority' => request()->priority,
            'slug' => Str::slug(request()->name),
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
            request()->image->move(public_path('uploads/cate'), $img_name);
        }
        $query = $query->update([
            'name' => request()->name,
            'status' => request()->status,
            'parent_id' => request()->parent_id,
            'priority' => request()->priority,
            'slug' => Str::slug(request()->name),
            'image' => $img_name,
        ]);
        return $query;
    }
    public function scopeXoa($query, $id)
    {
        # code...
        $query = $query->find($id);
        if ($n = $query->prods->count() > 0) {
            # code...
            return $n;
        }
        $query->delete();
        return 0;
    }
}
