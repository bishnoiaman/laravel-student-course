<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\studentcourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("course.index",['data'=>course::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name'=>"required|min:3|max:25",
        //     'fees'=>"required|numeric|min:500"
        // ]);
        $info=[
            'name'=>$request->name,
            'fees'=>$request->fees,
            'discount'=>$request->discount,
            
        ];
        course::create($info);
        return redirect('/course')->with('grt','Record Saved Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(course $course )
    {
        
    }
    public function loadcourse($id,$sid)
    {
         $course = studentcourse::where(['course_id'=>$id,'student_id'=>$sid])->get()->first();
        //dd($course);
         return $course;
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(course $course)
    {
        //
        return view('course.edit',['info'=>$course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, course $course)
    {
        //
        $course->name=$request->name;
        $course->fees=$request->fees;
        $course->discount=$request->discount;
        
        $course->save();
        return redirect('/course')->with('grt','Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(course $course)
    {
         $course->delete();
         return redirect('/course')->with('err','Record Removed Successfully');


    }
}
