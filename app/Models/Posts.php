<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

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
}
