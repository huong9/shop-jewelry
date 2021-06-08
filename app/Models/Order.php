<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $fillable = ['user_id', 'address', 'total', 'status', 'name', 'email', 'phone', 'note', 'payment'];

    public function detail()
    {
        # code...
        return $this->hasMany(orderDetail::class, 'order_id', 'id');
    }

    public function scopeThem($query, $id, $price)
    {
        # code...
        $add = $this->create([
            'user_id' => $id,
            'address' => request()->address . ', ' . request()->district . ', ' . request()->city,
            'total' => $price,
            'name' => request()->name,
            'email' => request()->email,
            'phone' => request()->phone,
            'note' => request()->note,
            'payment' => request()->payment,
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
        if ($n = $query->detail->count() > 0) {
            # code...
            return $n;
        }
        $query->delete();
        return 0;
    }
    public function scopeUserXoa($query, $id)
    {
        # code...
        $query = $query->find($id);
        if ($n = $query->detail->count() > 0) {
            foreach ($query->detail as $value) {

                $query2 = orderDetail::find($value->id);
                $query2->delete();
            }
        }
        $query->delete();
        return $query;
    }
}
