<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentSpam extends Model
{
    //
    protectd $table = 'comments_spam'
    protectd $fillable = ['user_id', 'comment_id'];

    public $timestamps = false;
}
