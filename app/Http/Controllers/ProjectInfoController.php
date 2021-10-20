<?php

namespace App\Http\Controllers;

use App\ProjectInfo;
use Illuminate\Http\Request;
use DB;


class ProjectInfoController extends Controller
{


    
    
    public function index()
    {
        $project_info=DB::table('project_infos')->get();

        return view('project_info', compact('project_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $data['user_id']=$request->user_id;
        $data['project_name']=$request->project_name;
        $data['project_duration']=$request->project_duration;
        $data['demo_url']=$request->demo_url;

        /*echo "<pre>";
        print_r($data);
        exit();*/


        $all_user=DB::table('project_infos')->insert($data);

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

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectInfo  $projectInfo
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectInfo $projectInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectInfo  $projectInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectInfo $projectInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectInfo  $projectInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectInfo $projectInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectInfo  $projectInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectInfo $projectInfo)
    {
        //
    }
}
