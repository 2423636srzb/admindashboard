<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class File extends Model
{
    use HasFactory,LogsActivity;

    protected static $logName = 'File';

    protected $fillable = ['file_name', 'name', 'file_id'];

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
