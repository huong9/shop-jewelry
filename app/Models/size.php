<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    //
    protected $table = 'size';
    protected $fillable = ['name', 'param'];

    public function prodDs()
    {
        # code...
        return $this->hasMany(productDetail::class, 'size_id', 'id');
    }

    public function scopeThem()
    {
        # code...
        $add = $this->create(request()->all());
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
        if ($n = $query->prodDs->count() > 0) {
            # code...
            return $n;
        }
        $query->delete();
        return 0;
    }
}
