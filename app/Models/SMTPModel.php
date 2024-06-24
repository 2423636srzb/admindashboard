<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class SMTPModel extends Model
{
    use HasFactory,LogsActivity;

    protected static $logName = 'SMTP';

    protected $table = 'smtp';
   static public function getSingle(){
    return self::find(1);
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
