<?php

namespace App\Http\Controllers;

use App\Mail\EventMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function index(){

        return view('admin.notifications.event_notification');
    }

    public function send(Request $request){

        $request->validate([
            'subject' => 'required|string|max:255',
            'messages' => 'required|string',
        ]);

        $from =Auth::user()->email;

        $details = [
            'from' => $from,
            'subject' => $request->subject,
            'messages' => $request->message
        ];
        $users = User::where('id', '!=', Auth::id())->get();

        foreach ($users as $user) {
          $details['userName'] = $user->name;
            Mail::to($user->email)->send(new EventMail($details));
        }

        return redirect()->back()->with('message', 'Email sent successfully to all users!');
    }
    
}
