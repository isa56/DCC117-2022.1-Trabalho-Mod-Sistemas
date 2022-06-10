<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PostsComment;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'vote',
        'finished',
        'user_id',
    ];

    public function comments() 
    {
        return $this->hasMany(PostsComment::class);
    }
}