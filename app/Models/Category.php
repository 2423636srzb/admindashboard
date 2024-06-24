<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use HasFactory,LogsActivity;

    protected $fillable = ['name'];
    protected static $logName = 'Category';

    public function products()
    {
        return $this->hasMany(Posts::class, 'category_id');
    }

    public function posts()
{
    return $this->hasMany(Posts::class, 'category_id');
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

