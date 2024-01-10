<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Filterable;
    protected $table = 'products';
    protected $fillable = [
        'title',
        'desc',
        'content',
        'prev_image',
        'count',
        'price',
        'is_published',
        'category_id',
    ];

    public function category()
    {
       return $this->belongsTo(Category::class,'category_id','id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id','id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class,'color_products','product_id','color_id','id');
    }

    public function getImageUrlAttribute()
    {
        return url('storage/'.$this->prev_image);
    }
}
