<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Models\sims_info;
use Illuminate\Support\Facades\DB;


class courseGrade extends Controller
{
    //
    public function index()
    {
        //foreach($_POST as $k => $v){
        // if($k!= '_token'&&$k!='type'){
        //     Grade::create([
        //         'type'=>$request->type,
        //         'param'=>"$k",
        //         'data'=>"$v",
        //         'uuid'=> ($uuid+1)]);
        //         // $msg = $request->name .' has been stored';
        //         // return redirect()->back()->with('done',$msg);
        // }}

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grades = sims_info::where('type', '=', 3)->where('param', '=', 'name')->get()->toArray();

        foreach ($grades as $k => $v) {
            $arr[] = $v['uuid'];
        }
        $page = $_GET['page'];
        if ($page == 'student') {
            foreach ($_POST as $k => $v) {
                if ($k == 'studentId') {
                    foreach ($v as $a => $b) {
                        foreach ($arr as $q => $w) {
                            Grade::create([
                                'student_id' => $b,
                                'course_id' => $request->coursesId,
                                'grade_item' => $w
                            ]);
                        }

                        // $msg = $request->name .' has been stored';
                        // return redirect()->back()->with('done',$msg);
                    }
                }
                // echo"<pre>";
                // print_r($_POST);
                // return 0;
            }
            echo "done";
        } elseif ($page == 'course') { //echo "<pre>";print_r($_POST);return 0;
            foreach ($_POST as $k => $v) {
                if ($k == 'coursesId') {

                    foreach ($v as $a => $b) {
                        foreach ($arr as $q => $w) {
                            Grade::create([
                                'student_id' => $request->studentId,
                                'course_id' => $b,
                                'grade_item' => $w
                            ]);
                        }

                        // $msg = $request->name .' has been stored';
                        // return redirect()->back()->with('done',$msg);
                    }
                }
                // echo"<pre>";
                // print_r($_POST);
                // return 0;
            }
            echo "done";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }
    public function removeCourseFromStudent(){
        
        $studentId=$_GET['studentId'];
        $courseId=$_GET['courseId'];
        DB::table('sims_coursegrade')
        ->where('student_id','=', $studentId)
        ->where('course_id','=',$courseId)  // find your user by their email  // optional - to ensure only one record is updated.
        ->update(array('activ' => 0));
        return redirect()->back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
}
