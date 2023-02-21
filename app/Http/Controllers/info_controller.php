<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\sims_info;
use Illuminate\Http\Request;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;

class info_controller extends Controller
{
    //
    public function index()
    {
        //
        // $info =info::simplepaginate(2);

        $students = sims_info::where('type', '=', 2)->get()->toArray();


        foreach ($students as $k => $v) {
            $arr[$v['uuid']][$v['param']] = $v;
        }
        return view("students.show", compact("arr"));
        //    echo"<pre>";
        //    print_r($arr);
        //    return 0;

    }

    public function indexCourse()
    {
        $courses = sims_info::where('type', '=', 1)->get()->toArray();


        foreach ($courses as $k => $v) {
            $arr[$v['uuid']][$v['param']] = $v;
        }
        return view("courses.show", compact("arr"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Post::create([
        //     'title'=>$request->title,
        //     'description'=>$request->description,
        //     'user_id'=>auth()->id()
        // ]);
        // $msg = $request->name .' has been stored';
        // return redirect()->back()->with('done',$msg);
        $uuid = DB::table('sims_info')->where('type', $request->type)->max('uuid');
        foreach ($_POST as $k => $v) {
            if ($k != '_token' && $k != 'type') {
                sims_info::create([
                    'type' => $request->type,
                    'param' => "$k",
                    'data' => "$v",
                    'uuid' => ($uuid + 1)
                ]);
                // $msg = $request->name .' has been stored';
                // return redirect()->back()->with('done',$msg);
            }
        }
        echo "<pre>";
        print_r($_POST);
        return 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $info = info::where('id', '=', $id)->first();
        // return view("admin.posts.show",compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        // $info = info::where('id', '=', $id)->first();

        // // $user =User::FindorFail($id);
        // return view("admin.posts.update",compact('post'));
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
        //
        //     $info = info::where('id', '=', $id)->first();


        // $info ->update([
        //     'title'=>$request->title,
        //     'description'=>$request->description,
        // ]);
        //     $msg = $request->title .' has been updated';
        //     return redirect()->back()->with('update',$msg);

        //     return view("admin.posts.all",compact('post'));

        // }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCourses()
    {
        $courses = sims_info::where('type', '=', 1)->get()->toArray();;
        foreach ($_GET as $k => $v) {
            $uuid = $k;
        }
        foreach ($courses as $k => $v) {
            $arr[$v['uuid']][$v['param']] = $v;
        }
        return view("students.addCourse", compact('arr'), compact('uuid'));
    }
    public function showCourses()
    {
        foreach ($_GET as $k => $v) {
            $uuid = $k;
        }
        $student = sims_info::where('uuid', '=', $uuid)->where('type','=',2)->get()->toArray();
        $courses=Grade::join('sims_info','sims_info.uuid','=','course_id')->where('student_id','=',$uuid)->where('type','=',1)->where('activ','=',1)->groupBy('course_id')->get()->toArray();
        //echo "<pre>";print_r($student);return 0;
        return view("students.studentdata", compact('student'),compact('courses'));
    }
    public function showStudents()
    {
        foreach ($_GET as $k => $v) {
            $uuid = $k;
        }
        $courses = sims_info::where('uuid', '=', $uuid)->where('type','=',1)->get()->toArray();
        $students=Grade::join('sims_info','sims_info.uuid','=','course_id')->where('student_id','=',$uuid)->where('activ','=',1)->where('type','=',2)->groupBy('student_id')->get()->toArray();
        //echo "<pre>";print_r($courses);return 0;
        return view("courses.CourseData", compact('students'),compact('courses'));
    }
    // $uuid
    public function removeStudent(){

    }
    public function destroy($id)
    {
        //

    }
    public function getStudents()
    {
        $students = sims_info::where('type', '=', 2)->get()->toArray();;
        foreach ($_GET as $k => $v) {
            $uuid = $k;
        }
        foreach ($students as $k => $v) {
            $arr[$v['uuid']][$v['param']] = $v;
        }
        return view("courses.addStudents", compact('arr'), compact('uuid'));
    }
}
