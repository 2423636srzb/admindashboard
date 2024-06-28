<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\SMTPModel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $websitesetting = Setting::first();
         View::share('appSetting', $websitesetting);

         $mailSetting = SMTPModel::getSingle();
        //  dd($mailSetting);
         if(!empty($mailSetting)){
            $data_mail = [
                'driver' => $mailSetting->mail_mailer,
                'host' => $mailSetting->mail_host,
                'port' => $mailSetting->mail_port,
                'encryption' => $mailSetting->mail_encryption,
                'username' => $mailSetting->mail_userName,
                'password' => $mailSetting->mail_password,
                'from' => [
                    'address'=> $mailSetting->mail_from_address,
                    'name' =>$mailSetting->name
                ]
            ];
            Config::set('mail',$data_mail);
         }
    }
}
