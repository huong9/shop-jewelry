<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class newsletter extends Model
{
    public $timestamps = false;
    protected $table = 'newsletter';
    protected $fillable = ['email', 'status'];

    public function scopeThem($query)
    {
        $add = 0;
        $email = $query->where('email', '=', request()->email)->first();
        if (!$email) {
            $add = $this->create([
                'email' => request()->email,
            ]);
        }
        return $add;
    }
}
