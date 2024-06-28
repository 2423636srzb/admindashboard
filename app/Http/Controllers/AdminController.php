<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Notifications\CriticalErrorNotification;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function index(){
      $lifetime = config('session.lifetime');
      $activeSessionsCount = DB::table('sessions')
          ->where('last_activity', '>=', Carbon::now()->subMinutes($lifetime)->getTimestamp())
          ->count();


          $now = Carbon::now();
          $oneWeekAgo = $now->subWeek();
          $lastWeekRegistrations = User::where('created_at', '>=', $oneWeekAgo)->count();

          $data = [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                    'data' => [65, 59, 80, 81, 56, 55, 40],
                ],
            ],
        ];

          

    return view('admin.index',compact('activeSessionsCount','lastWeekRegistrations','data'));
   }


   public function showNotifications()
    {
        $notifications = auth()->user()->notifications; // Get all notifications for the authenticated admin
        return view('admin.notifications.new_user', compact('notifications'));
    }
   public function markAsRead($id)
   {
       $notification = auth()->user()->notifications()->find($id);

       if ($notification) {
           $notification->markAsRead();
       }

       return redirect()->back();
   }

   public function markAsUnread($id)
   {
       $notification = auth()->user()->notifications()->find($id);

       if ($notification) {
           $notification->markAsUnread();
       }

       return redirect()->back();
   }

   public function criticalError(){
    $notifications = Auth::user()->notifications()->where('type', CriticalErrorNotification::class)->get();
    return view('admin.notifications.system_error', compact('notifications'));
   }
}
