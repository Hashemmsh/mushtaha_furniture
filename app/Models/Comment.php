<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory , softDeletes;

     protected $guarded = [];

     public function user()
     {
        return $this->belongsTo(User::class)->withDefault();
     }

     public function post()
     {
        return $this->belongsTo(Post::class)->withDefault();
     }
}
