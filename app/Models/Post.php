<?php

namespace App\Models;
use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory , SoftDeletes , Trans;

    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function comment()
    {
       return $this->hasMany(Comment::class);
    }
}
