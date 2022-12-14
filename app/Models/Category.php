<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory , SoftDeletes  , Trans;

    protected $fillable= [
        'name',
        'image',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class ,'parent_id')->withDefault();
    }

    public function children()
    {
        return $this->hasMany(Category::class , 'parent_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }


}
