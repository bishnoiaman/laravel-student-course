@extends('layouts.app')
@section('content')
<div class="container" style="border-style:inset; border-width:12px">
    @csrf 
    @if($gt=Session::get('grt'))
        <div class="alert alert-success">
            {{$gt}}
        </div>
    @endif
    @if($gt=Session::get('err'))
        <div class="alert alert-danger">
            {{$gt}}
        </div>
    @endif
    <h1 class="text-center">Students</h1>
    <a href="/student/create" class="button-33" >Add Student</a>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th style="font-size:18px; color:purple" class="text-center">S.NO</th>
                <th style="font-size:18px; color:purple" class="text-center">Fees</th>
                <th style="font-size:18px; color:purple" class="text-center">Name</th>
                <th style="font-size:18px; color:purple" class="text-center">Date Of Birth</th>
                <th style="font-size:18px; color:purple" class="text-center">Courses</th>
                <th style="font-size:18px; color:purple" class="text-center">Action</th>
            </tr>
        </thead>
    <tbody>
        @foreach($data as $info)
            <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td class="text-center">
                    @php
                    
                    $allcourse=[];
                    $allcourseid=[];
                    $firstcourse="";
                    foreach($info->allcourse as $cid){
                        if(isset($cid['name'])){
                            if(!$firstcourse){ 
                                $firstcourse=$cid; 
                            }
                                $allcourse[]=$cid['name'];
                        $allcourseid[$cid['course_id']]=$cid['name'];
                            }
                        }
                        
                
                
                    $allcourse=implode(',',$allcourse);

                    @endphp


                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_{{$info['id']}}">Fees Details</button>

                    <!-- Modal -->
                    <div class="modal fade" id="Modal_{{$info['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$info['name']}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="/studentcoursse/{{$info['id']}}" id="frm_{{$info['id']}}">
                    @csrf
                        @method('patch')
                    <div class="modal-body">
                    <div class="container" style="border-style:outset; border-width:12px">
    @foreach($errors->all() as $e)
        <div class="alert alert-danger">{{$e}}</div>
    @endforeach
    <h1 style="color:green" class="text-center">Add New Course</h1>
    <div class="mb-3" style="color:green; font-size:20px">
        <label for="cname">Select Course</label>
    
        <select  name="name" id="cname" onchange="loadInfo(frm_{{$info['id']}},{{$info['id']}})" required class="form-select">
        @foreach($allcourseid as $key=>$value)
        <option value="{{$key}}">{{$value}}</option>
        @endforeach
        </select> 
    </div>

    <div class="mb-3" style="color:green; font-size:20px">
    
        <label for="fees">Course Fees</label>
        <input type="number"  name="fees"  readonly id="fees" required placeholder="Enter Course Fees"  class="form-control" value="{{$firstcourse['fees']}}">
    </div>
    
        
    <div class="mb-3" style="color:green; font-size:20px">
        <label for="discount">Discount</label>
        <input  value="{{$firstcourse['discount']}}"
        type="text" name="discount" min="0" max="100"  id="discount" required placeholder="Enter Course Discount" class="form-control" onchange="changefees(frm_{{$info['id']}})" onkeyup="changefees(frm_{{$info['id']}})"
         >
    </div>

    <div class="mb-3" style="color:green; font-size:20px">
        <label for="finalfees">Final Fees</label>
        <input type="text" name="finalfees" id="finalfees" required placeholder="Enter finalfees" 
        class="form-control" onchange="changefees2(frm_{{$info['id']}})" onkeyup="changefees2(frm_{{$info['id']}})"  
        value="{{$firstcourse['fees']-$firstcourse['fees']*$firstcourse['discount']/100}}">
    </div>


</div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>
                </td>
                <td class="text-center">
                    <a href="/student/{{$info['id']}}/edit" class="link-offset-2 link-underline link-underline-opacity-0" title="Edit">
                    {{$info['name']}}</a>
                </td>
                <td class="text-center">{{$info['dob']}}</td>
                <td class="text-center"> 
                    @php
                    $allcourse=[];
                    foreach($info->allcourse as $cid){
                    if(isset($cid['courseId']['name']))
                            $allcourse[]=$cid['courseId']['name'];
                    }$allcourse=implode(',',$allcourse);
                    @endphp
                    {{$allcourse}}
                </td>
                <td class="text-center">
                    <form method="post" action="/student/{{$info['id']}}">
                        @csrf 
                        @method('delete')
                        <button class="button-32" onclick="return confirm('Do you really want to perform this Action?')">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

<style>
    



    h1 { 
        font-size: 70px;
        font-weight:600;
        font-family: 'roboto', sns-serif;
        color:#A0522D;
        text-transform:uppercase;
        text-shadow: 1px 1px 0px #A0522D,
             1px 2px 0px #BC8F8F,
             1px 3px 0px #BC8F8F,
             1px 4px 0px #BC8F8F,
             1px 5px 0px #BC8F8F,
             1px 6px 0px #BC8F8F,
             1px 10px 5px rgba(16, 16, 16, 0.5),
             1px 15px 10px rgba(16, 16, 16, 0.4),
             1px 20px 30px rgba(16, 16, 16, 0.3),
             1px 25px 50px rgba(16, 16, 16, 0.2); 
        } 
    
    
.button-33 {
  background-color:orange;
  border-radius: 100px;
  box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
  color: black;
  cursor: pointer;
  display: inline-block;
  font-family: CerebriSans-Regular,-apple-system,system-ui,Roboto,sans-serif;
  padding: 7px 20px;
  text-align: center;
  text-decoration: none;
  transition: all 250ms;
  border: 0;
  font-size: 16px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-33:hover {
  box-shadow: rgba(44,187,99,.35) 0 -25px 18px -14px inset,rgba(44,187,99,.25) 0 1px 2px,rgba(44,187,99,.25) 0 2px 4px,rgba(44,187,99,.25) 0 4px 8px,rgba(44,187,99,.25) 0 8px 16px,rgba(44,187,99,.25) 0 16px 32px;
  transform: scale(1.05) rotate(-1deg);
}


.button-32 {
  background-color:orange;
  border-radius: 15px;
  color: #000;
  cursor: pointer;
  font-weight: bold;
  padding: 10px 15px;
  text-align: center;
  transition: 200ms;
  width: 80%;
  box-sizing: border-box;
  border: 0;
  font-size: 16px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-32:not(:disabled):hover,
.button-32:not(:disabled):focus {
  outline: 0;
  background: red;
  box-shadow: 0 0 0 2px rgba(0,0,0,.2), 0 3px 8px 0 rgba(0,0,0,.15);
}

.button-32:disabled {
  filter: saturate(0.2) opacity(0.5);
  -webkit-filter: saturate(0.2) opacity(0.5);
  cursor: not-allowed;
}
</style>

<script>
    function loadInfo(frm,sid){
        $.ajax({
            url:'/courseap/'+frm.name.value+"/"+sid,
            type:"get",
            success:function(r){
                frm.fees.value=r.fees;
                frm.discount.value=r.discount;
                frm.finalfees.value=r.fees-r.fees*r.discount/100;
            }
        });
    }

    function changefees(frm){
        if(frm.discount.value<=100 && frm.discount.value>=0)
            frm.finalfees.value = frm.fees.value - frm.fees.value * frm.discount.value/100;
    }

    function changefees2(frm){
        frm.discount.value = (frm.fees.value-frm.finalfees.value)*100 / frm.finalfees.value;
    }

</script>
@endsection