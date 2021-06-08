<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articleCommentReply extends Model
{
    protected $table = 'article_comment_reply';
    protected $fillable = ['cmt_id', 'user_id', 'email', 'name', 'comment'];


    public function scopeThem($query, $id, $user_id)
    {
        $add = $this->create([
            'cmt_id' => $id,
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
