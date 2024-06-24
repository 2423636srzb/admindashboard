<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Setting extends Model
{
    use HasFactory,LogsActivity;
    protected $table = 'settings';
   
    protected static $logName = 'Setting';


    protected $fillable = [
        'website_name',
        'website_url',
        'page_title',
        'meta_keyword',
        'meta_description',
        'address',
        'phone_no',
        'email',
        'facebook',
        'instagram',
        'twitter',
        'linkedin'
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
