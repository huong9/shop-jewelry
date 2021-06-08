<?php

namespace App\Models;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class news extends Model
{
    protected $table = 'article';
    protected $fillable = ['name', 'image', 'status', 'description', 'user_id', 'slug'];

    public function comments()
    {
        return $this->hasMany(articleComment::class, 'article_id', 'id');
    }

    public function newImg()
    {
        return $this->hasMany(newImg::class, 'article_id', 'id');
    }
    public function newContent()
    {
        return $this->hasMany(newContent::class, 'article_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function scopeThem()
    {
        # code...
        $img_name = '';
        if (request()->has('image')) {
            # code...
            $img_name = request()->image->getClientOriginalName();
            request()->image->move(public_path('uploads/news'), $img_name);
        }
        $add = $this->create([
            'name' => request()->name,
            'status' => request()->status,
            'user_id' => Auth::user()->id,
            'description' => request()->description,
            'image' => $img_name,
            'slug' => Str::slug(request()->name),
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
            request()->image->move(public_path('uploads/news'), $img_name);
        }
        $query = $query->update([
            'name' => request()->name,
            'status' => request()->status,
            'user_id' => Auth::user()->id,
            'description' => request()->description,
            'image' => $img_name,
            'slug' => Str::slug(request()->name),
        ]);

        return $query;
    }
    public function scopeXoa($query, $id)
    {
        # code...
        $query = $query->find($id);
        if (($n = $query->comments->count() > 0) || ($n = $query->newContent->count() > 0)) {
            return $n;
        }
        $query->delete();
        return 0;
    }
}
