<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'image',
        'price',
        'description',
        'quantity',
        'sale',
        'size_id',
        'color_id',
        'category_id'
    ];
    protected $casts = [
        'sale' => 'boolean'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}