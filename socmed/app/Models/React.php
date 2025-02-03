<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;
class React extends Model
{   
    protected $fillable= [
        'user_id',
        'post_id',
        'action'
    ];
    /** @use HasFactory<\Database\Factories\ReactFactory> */
    use HasFactory;
    
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
