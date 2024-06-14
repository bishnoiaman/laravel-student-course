@extends('layouts.app')
@section('content')
<style>
    
</style>
<div class="container" style="border-style:outset; border-width:12px">
    @foreach($errors->all() as $e)
        <div class="alert alert-danger">{{$e}}</div>
    @endforeach
    <form method="post" action ="/student" enctype="multipart/form-data">
    @csrf
    <h1 style="color:red" class="text-center">Add New Student</h1>
    <div class="mb-3">
        <label style="color:purple; font-size:20px">Select Courses :</label>
        <div class="dgrid">
            @foreach($cdata as $cinfo)
            <div style="color:red; font-size:18px">
                <input type="checkbox" id="c{{$cinfo['id']}}" name="course_id[]" value="{{$cinfo['id']}}">
                <label for="c{{$cinfo['id']}}">
                {{$cinfo['name']}}
                </label>
            </div>  
            @endforeach 
        </div>
    </div>

    <div style="color:purple; font-size:20px">
        <label for="name">Student Name</label>
        <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="Enter Your Name" class="form-control" required>
    </div>

    <div style="color:purple; font-size:20px">
        <label for="dob">Date of Birth </label>
        <input type="date" name="dob" id="dob" value="{{old('dob')}}" class="form-control" required>
    </div>

    <div style="color:purple; font-size:20px">
        <label for="photo">Student Photo</label>
        <input type="file" name="photo" id="photo" class="form-control" accept="image/jpeg,image/jpg">
    </div>
<br>
    <div class="mb-3 text-center">
        <button class="button-24">Save</button>
    </div>

   

</form>
</div>
<style>
.dgrid{
        border:1px solid;
        padding:5px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr
    }

 h1 { 
            font-size: 4rem; 
            text-shadow: 7px 3px 7px purple; 
        } 
    
   
.button-24 {
  background: #FF4742;
  border: 1px solid #FF4742;
  border-radius: 6px;
  box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: nunito,roboto,proxima-nova,"proxima nova",sans-serif;
  font-size: 16px;
  font-weight: 800;
  line-height: 16px;
  min-height: 40px;
  outline: 0;
  padding: 12px 14px;
  text-align: center;
  text-rendering: geometricprecision;
  text-transform: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
}

.button-24:hover,
.button-24:active {
  background-color: initial;
  background-position: 0 0;
  color: #FF4742;
}

.button-24:active {
  opacity: .5;
}
</style>

@endsection