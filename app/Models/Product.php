<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'price', 'sale_price', 'image',
        'category_id', 'status', 'sku', 'stock_quantity', 'weight', 
        'dimensions', 'meta_description', 'meta_keywords'
    ];
}
