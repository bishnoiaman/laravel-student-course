@extends('layouts.app')
@section('content')
<div class="container" style="border-style:solid; border-width:5px">
    <form method="post" action ="/course/{{$info['id']}}">
    @csrf
    <h1 style="color:green" class="text-center">Edit Record</h1>
    @method('patch')
    <div class="mb-3" style="color:green; font-size:20px">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" required class="form-control" value="{{$info['name']}}">
    </div>

    <div class="mb-3" style="color:green; font-size:20px">
        <label for="fees">Course Fees</label>
        <input type="number"  name="fees" id="fees" required class="form-control" value="{{$info['fees']}}">
    </div>
        
    <div class="mb-3" style="color:green; font-size:20px">
        <label for="discount">Discount</label>
        <input type="number" name="discount" id="discount" required class="form-control" value="{{$info['discount']}}">
    </div>

   
    <div class="text-center">
        <button class="button-74">Update Record</button>
    </div>
</form>
</div>
<style>
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
@endsection