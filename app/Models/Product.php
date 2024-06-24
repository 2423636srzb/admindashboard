<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use HasFactory,LogsActivity;
    protected static $logName = 'Product';

    protected $fillable = [
        'title', 'slug', 'description', 'price', 'sale_price', 'image',
        'category_id', 'status', 'sku', 'stock_quantity', 'weight', 
        'dimensions', 'meta_description', 'meta_keywords'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty();
    }
    protected function getLogNameToUse(string $eventName = ''): string
    {
        return static::$logName;
    }
}
