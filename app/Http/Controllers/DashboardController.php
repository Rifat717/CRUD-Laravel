<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;


class DashboardController extends Controller
{
    public function logout()
    {
        Session::flush();
        return Redirect::to('/');
    }
    
    public function AdminAuthCheck()
    {
    $admin_id=Session::get('id');
        if ($admin_id) {
            return;
        }else{
            return Redirect::to('/')->send();
        }
    }
        
    public function index()
    {
        $this->AdminAuthCheck();
        $project_info=DB::table('project_infos')
                ->join('all_users','project_infos.user_id','all_users.id')
                ->select('all_users.user_name','all_users.password','project_infos.*')
                ->first();
        $dashboard=DB::table('project_modules')->get();
        return view('dashboard', compact('project_info','dashboard'));
        
 
        /*return view('dashboard',compact('dashboard'));*/
    }

    public function clientDashboard()
    {
        $this->AdminAuthCheck();
        $project_info=DB::table('project_infos')
                ->join('all_users','project_infos.user_id','all_users.id')
                ->select('all_users.user_name','all_users.password','project_infos.*')
                ->first();
        $dashboard=DB::table('project_modules')->get();
        return view('client_dashboard', compact('project_info','dashboard'));
        
 
        
    }

    public function staffDashboard()
    {
        $this->AdminAuthCheck();
        $project_info=DB::table('project_infos')
                ->join('all_users','project_infos.user_id','all_users.id')
                ->select('all_users.user_name','all_users.password','project_infos.*')
                ->first();
        $dashboard=DB::table('project_modules')->get();
        return view('staff_dashboard', compact('project_info','dashboard'));
        
 
        
    }


}
