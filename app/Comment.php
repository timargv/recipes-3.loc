<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protectd $table = 'comments'
    protectd $fillable = ['user_id', 'reply_id', 'text', 'status'];

    public function replies() {
        return $this->hasMany(self::class, 'id', 'reply_id');
    }

    // public function spam() {
    //     return $this->hasMany(CommentSpam::class, 'user_id', 'comment_id');
    // }

    // Получить пользователя с данным комментарием
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
