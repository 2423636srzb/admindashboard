<?php

namespace App\Http\Controllers;


use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function index(){
        $activities = Activity::all();

        return view('admin.reports.user_activity',compact('activities'));
    }

   
    
}
