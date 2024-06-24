<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Posts extends Model
{
    use HasFactory,LogsActivity;

    protected static $logName = 'Post';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'summary',
        'author_id',
        'category_id',
        'status',
        'published_at',
        'image',
        'meta_description',
        'meta_keywords',
    ];
    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'author_id');
}

public function category()
{
    return $this->belongsTo(Category::class, 'id');
}

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
