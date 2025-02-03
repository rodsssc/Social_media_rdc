<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Models\React;
class Post extends Model
{   
    protected $fillable=[
        'user_id',
        'content',
        'image'
    ];
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function react(){
        return $this->hasMany(React::class);
    }

}
