<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use App\Models\course;
use App\Models\StudentCourse; 

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=student::all();
        
        return view('student.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
        $cdata=course::all(['id','name']);
        return view('student.create',compact('cdata'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name'=>"required|min:2|max:25",
            'dob'=>"required",
            'photo'=>"file|image|mimes:jpeg,jpg|max:2048"
        ]);
        if($request->photo){
        $fileName=time() . '_' . $request->photo->getClientOriginalName();

        $request->photo->move(public_path('photo'),$fileName);
        } 

        $info=[
            'name'=>$request->name,
            'dob'=>$request->dob,
            'photo'=>$fileName??"",
        ];
        $obj=student::create($info);
        if(count($request->course_id)>0){
            foreach($request->course_id as $cid){
                $cdtl=course::find($cid);
                $scinfo=[
                    'course_id'=>$cid,
                    'student_id'=>$obj->id,
                    'name'=>$cdtl->name, 
                    'fees'=>$cdtl->fees,
                    'discount'=>$cdtl->discount,
                    'finalfees'=>$cdtl->discount ? $cdtl->fees - $cdtl->fees * $cdtl->discount/100 : $cdtl->fees 
                ];
                StudentCourse::create($scinfo);
            }
        }
        return redirect('/student')->with('grt','Record Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        $courses=array_column($student->allcourse->toArray(),'course_id');

        return view('student.edit',['info'=>$student,'cdata'=>course::all(['id','name']),'course'=>$courses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student)
    {
        $request->validate([
                 'name'=>"required|min:2|max:25",
                 'dob'=>"required",
                 'photo'=>"file|image|mimes:jpeg,jpg|max:2048"
             ]);
             $fileName=$student->photo;
            if($request->photo){
                if($fileName){
                    unlink("photo/$fileName");
                }
            $fileName=time() . '_' . $request->photo->getClientOriginalName();
    
            $request->photo->move(public_path('photo'),$fileName);
            } 
    
            
                $student->name=$request->name;
                $student->dob=$request->dob;
                $student->photo=$fileName;
                $student->save();

            if(count($request->course_id)>0){
                $sid=$student->id;
                Studentcourse::where('student_id',$sid)->delete();
                foreach($request->course_id as $cid){
                    $scinfo=[
                        'course_id'=>$cid,
                        'student_id'=>$student->id
                    ];
                    StudentCourse::create($scinfo);
                }
            }

            return redirect('/student')->with('grt','Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        $student->delete();
         return redirect('/student')->with('err','Record Removed Successfully');
    }
    public function studentcourseo($id){
        $cid=request('name');
        $sc=StudentCourse::where(['student_id'=>$id,'course_id'=>$cid])->get()[0];
        $sc->discount=request("discount");
        $sc->finalfees=request("finalfees");
        $info=$sc->toArray();
        array_pop($info);
        array_pop($info);
        unset($info['student_id']);
        unset($info['course_id']);
        //unset($info['updated_at']);
        StudentCourse::where(['student_id'=>$id,'course_id'=>$cid])->update($info);
        return redirect('/student')->with('grt','Fees Updated Successfully');
    }
    public function loadcourse(){
        echo "hello";
    }
}
