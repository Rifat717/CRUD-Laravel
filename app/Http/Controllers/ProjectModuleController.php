<?php

namespace App\Http\Controllers;

use App\ProjectModule;
use Illuminate\Http\Request;
use DB;


class ProjectModuleController extends Controller
{

    
    
    public function index()
    {
        $project_module=DB::table('project_modules')->get();

        return view('project_module', compact('project_module'));
    }

    public function complete($id)
    {
        $unactive=DB::table('project_modules')
                ->where('id', $id)
                ->update(['status'=>'Complete']);

        if ($unactive) {
                    $notification=array(
                        'message'=>'Successfuly UnActive',
                        'alert-type'=>'error'
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

    public function upcomming($id)
    {
        $unactive=DB::table('project_modules')
                ->where('id', $id)
                ->update(['status'=>'Upcomming']);

        if ($unactive) {
                    $notification=array(
                        'message'=>'Successfuly UnActive',
                        'alert-type'=>'error'
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

    public function ongoing($id)
    {
        $unactive=DB::table('project_modules')
                ->where('id', $id)
                ->update(['status'=>'Ongoing']);

        if ($unactive) {
                    $notification=array(
                        'message'=>'Successfuly UnActive',
                        'alert-type'=>'error'
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


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=array();
        $data['project_id']=$request->project_id;
        $data['module']=$request->module;
        $data['descriptoin']=$request->descriptoin;
        $data['timeline']=$request->timeline;
        $data['status']=$request->status;
        $data['remark']=$request->remark;
        $data['admin_remark']=$request->admin_remark;
        $data['clients_remark']=$request->clients_remark;
        

        /*echo "<pre>";
        print_r($data);
        exit();*/

        $project_module=DB::table('project_modules')->insert($data);

        if ($project_module) {
                    $notification=array(
                        'message'=>'Successfuly Module Inserted',
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

    
    public function show(ProjectModule $projectModule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectModule  $projectModule
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectModule $projectModule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectModule  $projectModule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectModule $projectModule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectModule  $projectModule
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectModule $projectModule)
    {
        //
    }
}
