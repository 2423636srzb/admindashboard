<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Tag extends Model
{
    use HasFactory,LogsActivity;

    protected static $logName = 'Tag';

    protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany(Posts::class, 'post_tag', 'tag_id', 'post_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
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

