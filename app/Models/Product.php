<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }

}
