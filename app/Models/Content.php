<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_content');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
