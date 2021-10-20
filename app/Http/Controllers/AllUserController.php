<?php

namespace App\Http\Controllers;

use App\AllUser;
use Illuminate\Http\Request;
use DB;
use Session;
session_start();

class AllUserController extends Controller
{
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
        $all_user=DB::table('all_users')->get();
        return view('all_user', compact('all_user'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $data=array();
        $data['user_type']=$request->user_type;
        $data['user_name']=$request->user_name;
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['password']=$request->password;

        /*echo "<pre>";
        print_r($data);
        exit();*/


        $all_user=DB::table('all_users')->insert($data);

        if ($all_user) {
                    $notification=array(
                        'message'=>'Successfuly User Inserted',
                        'alert-type'=>'success'
                    );

                    return Redirect()->back()->with($notification);
                }else{
                    $notification=array(
                        'message'=>'Error',
                        'alert-type'=>'error'
                    );
                    return Redirect()->back()->with($notification);
                }
    }

    public function userLoginProcess(Request $request){

        $userphone=$request->userphone;
        $userpassword=$request->userpassword;
        $result=DB::table('all_users')
                ->where('phone',$userphone)
                ->where('password',$userpassword)
                ->first();

            if ($result){
               Session::put('id',$result->id);
               Session::put('user_type',$result->user_type);
               Session::put('user_name',$result->user_name);
               Session::put('phone',$result->phone);
               Session::put('email',$result->email);
                $ip = $this->getIPAddress();  
               DB::table('all_users')
                ->where('phone', $userphone)
                ->update(['login_ip' => $ip]);
               
                /*$project_info=DB::table('project_infos')login_ip
                ->join('all_users','project_infos.user_id','all_users.id')
                ->select('all_users.user_name','all_users.password','project_infos.*')
                ->first();
                $dashboard=DB::table('project_modules')->get();*/
                return view('dashboard');
            }else{
                return view('login');
            }
    }

     public  function getIPAddress() {  
        $ipaddress = '';
            if (getenv('HTTP_CLIENT_IP'))
                $ipaddress = getenv('HTTP_CLIENT_IP');
            else if(getenv('HTTP_X_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
            else if(getenv('HTTP_X_FORWARDED'))
                $ipaddress = getenv('HTTP_X_FORWARDED');
            else if(getenv('HTTP_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_FORWARDED_FOR');
            else if(getenv('HTTP_FORWARDED'))
               $ipaddress = getenv('HTTP_FORWARDED');
            else if(getenv('REMOTE_ADDR'))
                $ipaddress = getenv('REMOTE_ADDR');
            else
                $ipaddress = 'UNKNOWN';
            return $ipaddress; 
    } 

    
    public function show(AllUser $allUser)
    {
        //
    }

    
    public function edit(AllUser $allUser)
    {
        //
    }

    
    public function update(Request $request, AllUser $allUser)
    {
        //
    }

    
    public function destroy(AllUser $allUser)
    {
        //
    }


    



    
}
