<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
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
    return view('admin.index',compact('activeSessionsCount','lastWeekRegistrations'));
   }
}
