<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = 'role';
    protected $fillable = ['name', 'permissions'];

    public function userRole()
    {
        # code...
        return $this->hasMany(userRole::class, 'role_id', 'id');
    }

    public function scopeThem($query)
    {
        $arr = ["account", "add_wishlist", "wishlist.delete"];
        if (!empty(request()->route)) {
            $arr = array_merge($arr, request()->route);
        }
        $routes = json_encode($arr);
        $add = $this->create([
            'name' => request()->name,
            'permissions' => $routes
        ]);
        return $add;
    }
    public function scopeSua($query, $id)
    {
        $query = $query->find($id);
        $arr = ["account", "add_wishlist", "wishlist.delete"];
        if (!empty(request()->route)) {
            $arr = array_merge($arr, request()->route);
        }
        $routes = json_encode($arr);
        $query = $query->update([
            'name' => request()->name,
            'permissions' => $routes
        ]);
        return $query;
    }
    public function scopeXoa($query, $id)
    {
        # code...
        $query = $query->find($id);
        if ($n = $query->userRole->count() > 0) {
            # code...
            return $n;
        }
        $query->delete();
        return 0;
    }
}
