<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class newContent extends Model
{
    protected $table = 'article_content';
    protected $fillable = ['article_id', 'content', 'img_header', 'img_footer'];

    public function new()
    {
        return $this->hasOne(news::class, 'id', 'article_id');
    }

    public function scopeThem()
    {
        $img_header = NULL;
        $img_footer = NULL;
        if (request()->has('img_header')) {
            # code...
            $img_header = request()->img_header->getClientOriginalName();
            request()->img_header->move(public_path('uploads/news'), $img_header);
        }
        if (request()->has('img_footer')) {
            # code...
            $img_footer = request()->img_footer->getClientOriginalName();
            request()->img_footer->move(public_path('uploads/news'), $img_footer);
        }
        $add = $this->create([
            'article_id' => request()->article_id,
            'content' => request()->content,
            'img_header' => $img_header,
            'img_footer' => $img_footer,
        ]);
        return $add;
    }

    public function scopeSua($query, $id)
    {
        $query = $query->find($id);

        $img_header = '';
        $img_footer = '';
        if (request()->has('img_header')) {
            # code...
            $img_header = request()->img_header->getClientOriginalName();
            request()->img_header->move(public_path('uploads/news'), $img_header);
        }
        if (request()->has('img_footer')) {
            # code...
            $img_footer = request()->img_footer->getClientOriginalName();
            request()->img_footer->move(public_path('uploads/news'), $img_footer);
        }
        $query = $query->update([
            'article_id' => request()->article_id,
            'content' => request()->content,
            'img_header' => $img_header,
            'img_footer' => $img_footer,
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
