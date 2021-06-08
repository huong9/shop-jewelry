<?php

namespace App\Models;

use App\articleCommentReply;
use Illuminate\Database\Eloquent\Model;

class articleComment extends Model
{
    protected $table = 'article_comment';
    protected $fillable = ['article_id', 'user_id', 'email', 'name', 'comment'];

    public function comment_rep()
    {
        return $this->hasMany(articleCommentReply::class, 'cmt_id', 'id');
    }

    public function scopeNumberComment($query, $article_id)
    {
        $query = $query->where('article_id', $article_id)->get();
        return $query->count();
    }
    public function scopeThem($query, $id, $user_id)
    {
        $add = $this->create([
            'article_id' => $id,
            'user_id' => $user_id,
            'email' => request()->email,
            'name' => request()->name,
            'comment' => request()->comment,
        ]);
        return $add;
    }
    public function scopeSua($query, $id)
    {
        $query = $query->find($id);
        $query = $query->update([
            'comment' => request()->comment,
        ]);

        return $query;
    }
    public function scopeXoa($query, $id)
    {
        $query = $query->find($id);
        $query->delete();
        return 0;
    }
}
