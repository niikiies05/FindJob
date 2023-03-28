<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        $numberOfUsers = User::all()->count();
        $numberOfJobs = Job::all()->count();


    $nberOfRecruitors = DB::table('model_has_roles')
        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->where('model_type', 'App\Models\User')
        ->where('roles.name', 'Recruiter')->count();

    $nberOfJobseekers = DB::table('model_has_roles')
        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->where('model_type', 'App\Models\User')
        ->where('roles.name', 'Candidate')->count();



        $users = User::select(DB::raw('COUNT(*) as count'))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

    $months = User::select(DB::raw('Month(created_at) as month'))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');

    $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

    foreach ($months as $index => $month) {
        $datas[$month] = $users[$index];
    }


    $nberOflikeByDay = Like::select(DB::raw('COUNT(*) as count'))
    ->whereYear('created_at', date('Y'))
    ->groupBy(DB::raw("Month(created_at)"))
    ->pluck('count');
$monthslike = Like::select(DB::raw('Month(created_at) as month'))
->whereYear('created_at', date('Y'))
->groupBy(DB::raw("Month(created_at)"))
->pluck('month');
$datalikes = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

foreach ($monthslike as $index => $monthlike) {
    $datalikes[$monthlike] = $nberOflikeByDay[$index];
}



    $nberOfJobByDay = Job::select(DB::raw('COUNT(*) as count'))
    ->whereYear('created_at', date('Y'))
    ->whereMonth('created_at', date('m'))
    ->groupBy(DB::raw("Day(created_at)"))
    ->pluck('count');

$days = Job::select(DB::raw('Day(created_at) as day'))
->whereYear('created_at', date('Y'))
->whereMonth('created_at', date('m'))
    ->groupBy(DB::raw("Day(created_at)"))
    ->pluck('day');


$dayjobdatas = array(0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0 ,0 ,0 ,0,0 ,0 ,0 ,0, 0, 0,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0);

    foreach ($days as $index => $day) {
        $dayjobdatas[$day] = $nberOfJobByDay[$index];
    }


        return view('welcomeAdmin', compact('datalikes','datas', 'dayjobdatas', 'numberOfUsers', 'numberOfJobs', 'nberOfRecruitors', 'nberOfJobseekers'));
    }
}
