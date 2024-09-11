<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;


    protected $table = 'posts';
    protected $fillable = ['title', 'body', 'user_id', 'like_count'];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    //a method to return the all posts in order of creation
    public function allPosts()
    {
        return $this->orderBy('created_at', 'desc')->get();
    }

}
