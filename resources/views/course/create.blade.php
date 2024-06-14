@extends('layouts.app')
@section('content')
<div class="container" style="border-style:outset; border-width:12px">
    @foreach($errors->all() as $e)
        <div class="alert alert-danger">{{$e}}</div>
    @endforeach
    <form method="post" action ="/course">
    @csrf
    <h1 style="color:green" class="text-center">Add New Course</h1>
    <div class="mb-3" style="color:green; font-size:20px">
        <label for="name">Course Name</label>
        <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Course Name" class="form-control">
    </div>

    <div class="mb-3" style="color:green; font-size:20px">
        <label for="fees">Course Fees</label>
        <input type="number"  name="fees" id="fees" required placeholder="Enter Course Fees" class="form-control">
    </div>
        
    <div class="mb-3" style="color:green; font-size:20px">
        <label for="discount">Discount</label>
        <input type="text" name="discount" id="discount" required placeholder="Enter Course Discount" class="form-control">
    </div>


    <div class="text-center">
        <button class="button-62">Save </button>
    </div>
</form>
</div>
<style>
   h1 { 
            font-size: 3rem; 
            text-shadow: 0px 7px 6px orange; 
        } 
   
.button-62 {
  background: linear-gradient(to bottom right, #EF4765, #FF9A5A);
  border: 0;
  border-radius: 12px;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,system-ui,"Segoe UI",Roboto,Helvetica,Arial,sans-serif;
  font-size: 16px;
  font-weight: 500;
  line-height: 2.5;
  outline: transparent;
  padding: 0 1rem;
  text-align: center;
  text-decoration: none;
  transition: box-shadow .2s ease-in-out;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
}

.button-62:not([disabled]):focus {
  box-shadow: 0 0 .25rem rgba(0, 0, 0, 0.5), -.125rem -.125rem 1rem rgba(239, 71, 101, 0.5), .125rem .125rem 1rem rgba(255, 154, 90, 0.5);
}

.button-62:not([disabled]):hover {
  box-shadow: 0 0 .25rem rgba(0, 0, 0, 0.5), -.125rem -.125rem 1rem rgba(239, 71, 101, 0.5), .125rem .125rem 1rem rgba(255, 154, 90, 0.5);
}

</style>
@endsection
