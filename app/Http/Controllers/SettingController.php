<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\Setting;
use App\Models\SMTPModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\eventMail;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index(){
        $setting = Setting::first();
         return view('admin.setting.index',compact('setting'));
    }

    public function store(Request $request){

     $setting =Setting::first();
     if($setting){
        $setting->update([
            'website_name'=> $request->website_name,
            'website_url'=>$request->website_url,
            'page_title'=> $request->page_title,
            'meta_keyword'=> $request->meta_keyword,
            'meta_description'=> $request->meta_description,
            'address'=> $request->address,
            'phone_no'=> $request->phone_no,
            'email'=> $request->email,
            'facebook'=> $request->facebook,
            'instagram'=> $request->instagram,
            'twitter'=> $request->twitter,
            'linkedin'=> $request->linkedin
        ]);
        return redirect()->back()->with('message','Setting Updated');

     }
     else{
        Setting::create([
            'website_name'=> $request->website_name,
            'website_url'=>$request->website_url,
            'page_title'=> $request->page_title,
            'meta_keyword'=> $request->meta_keyword,
            'meta_description'=> $request->meta_description,
            'address'=> $request->address,
            'phone_no'=> $request->phone_no,
            'email'=> $request->email,
            'facebook'=> $request->facebook,
            'instagram'=> $request->instagram,
            'twitter'=> $request->twitter,
            'linkedin'=> $request->linkedin
        ]);
        return redirect()->back()->with('message','Setting Created');
     }
    
    }

    public function smtpSetting(){
    $getRecord = SMTPModel::getSingle();
    return view('admin.setting.smtp',compact('getRecord'));
    }

    public function smtpUpdate(Request $request){
        $smtp = SMTPModel::getSingle();
        $smtp->name = trim($request->name);
        $smtp->mail_mailer = trim($request->mail_mailer);
        $smtp->mail_host = trim($request->mail_host);
        $smtp->mail_port = trim($request->mail_port);
        $smtp->mail_userName = trim($request->mail_userName);
        $smtp->mail_password = trim($request->mail_password);
        $smtp->mail_encryption = trim($request->mail_encryption);
        $smtp->mail_from_address = trim($request->mail_from_address);
        $smtp->save();
        return redirect()->back()->with('message','SMTP updated Successfully');
    }

    public function emailCreate(){
        return view('admin.setting.create_mail');
    }

    public function emailSend(Request $request)
    {
       
        dispatch(new SendEmailJob(['recipient'=>$request->recipient,'subject'=>$request->subject,'message'=>$request->message]));
        return redirect()->back()->with('message','Email Send');
    }
}
