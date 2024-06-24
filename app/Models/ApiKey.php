<?php

// app/Models/ApiKey.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ApiKey extends Model
{
    use HasFactory,LogsActivity;

    protected $fillable = ['name', 'key'];
    protected static $logName = 'ApiKey';

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
