<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';
    protected $fillable = ['recipe_id', 'user_id', 'reply_id', 'text', 'status'];

    public function replies() {
        return $this->hasMany(self::class, 'id', 'reply_id');
    }

    // public function spam() {
    //     return $this->hasMany(CommentSpam::class, 'user_id', 'comment_id');
    // }

    // Получить пользователя с данным комментарием
    public function author() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function recipe() {
        return $this->belongsTo(User::class, 'recipe_id', 'id');
    }

    public function getThreadedComments(){
        return $this->replies()->with('author')->get();
    }

}
