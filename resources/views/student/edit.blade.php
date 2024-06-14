@extends('layouts.app')
@section('content')
<div class="container" style="border-style:solid; border-width:5px">
    <form method="post" action ="/student/{{$info['id']}}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <h1 style="color:green" class="text-center" >Edit Record</h1>
    

    <div class="mb-3">
        <label style="color:purple; font-size:20px">Select Courses :</label>
        <div class="dgrid">
            @foreach($cdata as $cinfo)
            <div style="color:red; font-size:18px">
                <input type="checkbox" {{(in_array($cinfo['id'],$course))?"checked":""}} id="c{{$cinfo['id']}}" name="course_id[]" value="{{$cinfo['id']}}">
                <label for="c{{$cinfo['id']}}">
                {{$cinfo['name']}}
                </label>
            </div>  
            @endforeach 
        </div>
    </div>

    <div class="mb-3" style="color:green; font-size:20px">
        <label for="name">Student Name</label>
        <input type="text" class="form-control" name="name" id="name" required class="form-control" value="{{$info['name']}}">
    </div>

    <div class="mb-3" style="color:green; font-size:20px">
        <label for="dob">Date of Birth</label>
        <input type="date"  name="dob" id="dob" required class="form-control" value="{{$info['dob']}}">
    </div>

    
    @if($info['photos'])
    <div>
      @foreach($info->photos as $img)
      <div title="Click X for delete this image" id="photo_{{$img['id']}}">
      <img src="\photo\{{$img['file_path']}}" height="100px">
      <span onclick="delme({{$img['id']}})" style='font-size:50px;cursor:pointer;'>&#10007;</span>
      @endforeach
    </div>
    @endif
        
    <div class="mb-3" style="color:green; font-size:20px">
        <label for="photo">Student Photo</label>
        <input type="file" name="photo" id="photo"
        ÷≥≥≥≥≥≥≥≥≥≥≥≥;
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        class="form-control" value="{{$info['photo']}}">
    </div>

   
    <div class="text-center">
        <button class="button-74">Update Record</button>
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
            font-size: 3rem; 
            text-shadow: 0px 7px 6px orange; 
        } 

.button-74 {
  background-color: #fbeee0;
  border: 2px solid #422800;
  border-radius: 30px;
  box-shadow: #422800 4px 4px 0 0;
  color: #422800;
  cursor: pointer;
  display: inline-block;
  font-weight: 600;
  font-size: 18px;
  padding: 0 18px;
  line-height: 50px;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-74:hover {
  background-color: #fff;
}

.button-74:active {
  box-shadow: #422800 2px 2px 0 0;
  transform: translate(2px, 2px);
}

@media (min-width: 768px) {
  .button-74 {
    min-width: 120px;
    padding: 0 25px;
  }
}
</style>
<script>
  function delme(id){
    $.ajax({
      url:"",
      type:"get",
      success:function(r){

      }
    })
  }
</script>
@endsection