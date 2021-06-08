<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{

    protected $table = 'rating';
    protected $fillable = ['product_id', 'user_id', 'score', 'name', 'content', 'title'];

    public function scopeAllRating($query, $product_id)
    {
        $all = 0;
        $query = $query->where('product_id', $product_id)->get();
        foreach ($query as $item) {
            $all += $item->score;
        }
        $count = ($query->count() == 0) ? 1 : $query->count();
        return $all / $count;
    }
    public function scopeNumberRating($query, $product_id)
    {
        $query = $query->where('product_id', $product_id)->get();
        return $query->count();
    }
    public function scopeThem($query, $id, $user_id)
    {
        $add = 1;
        $exist = $query->where('product_id', $id)->where('user_id', $user_id)->first();
        if (!$exist) {
            $add = $this->create([
                'product_id' => $id,
                'user_id' => $user_id,
                'score' => request()->score,
                'name' => request()->name,
                'content' => request()->content,
                'title' => request()->title,

            ]);
        }
        return $add;
    }
    public function scopeSua($query, $id)
    {
        $query = $query->find($id);
        $query = $query->update([
            'score' => request()->score,
            'name' => request()->name,
            'content' => request()->content,
            'title' => request()->title,

        ]);

        return $query;
    }
    public function scopeXoa($query, $id)
    {
        $query = $query->find($id);
        $query->delete();
        return 0;
    }
    public function scopelistRating($query, $id)
    {
        $query = $query->where('product_id', $id)->get();
        return $query;
    }
    public function scopeListRatingExcept($query, $id, $user_id)
    {
        $query = $query->where([['product_id', $id], ['user_id', '!=', $user_id]])->get();
        return $query;
    }
}
