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
    <h1 class="text-center">COURSES</h1>
    <a href="/course/create" style="color:white" class="button-81 link-offset-2 link-underline link-underline-opacity-0">Add Course</a>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th style="font-size:18px; color:#960dad">S.NO</th>
                <th style="font-size:18px; color:#960dad">Course Name</th>
                <th style="font-size:18px; color:#960dad">Fees</th>
                <th style="font-size:18px; color:#960dad" class="text-center">Discount</th>
                <th style="font-size:18px; color:#960dad" class="text-center">Action</th>
            </tr>
        </thead>
    <tbody>
        @foreach($data as $info)
            <tr>
                <td >{{$loop->iteration}}</td>
                <td >
                    <a href="/course/{{$info['id']}}/edit" class="link-offset-2 link-underline link-underline-opacity-0" title="Edit">
                    {{$info['name']}}</a>
                </td>
                <td>{{$info['fees']}}</td>
                <td class="text-center">{{$info['discount']}}</td>
                
                <td class="text-center">
                    <form method="post" action="/course/{{$info['id']}}">
                        @csrf 
                        @method('delete')
                        <button class="button-78" onclick="return confirm('Do You Really want to Perform this Action?')">Remove</button>
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
        color:#b393d3;
        text-transform:uppercase;
        text-shadow: 1px 1px 0px #957dad,
             1px 2px 0px #957dad,
             1px 3px 0px #957dad,
             1px 4px 0px #957dad,
             1px 5px 0px #957dad,
             1px 6px 0px #957dad,
             1px 10px 5px rgba(16, 16, 16, 0.5),
             1px 15px 10px rgba(16, 16, 16, 0.4),
             1px 20px 30px rgba(16, 16, 16, 0.3),
             1px 25px 50px rgba(16, 16, 16, 0.2); 
        } 
         

    

       
       
.button-81 {
  background-color: #957dad;
  border: 0 solid #e2e8f0;
  border-radius: 1.5rem;
  box-sizing: border-box;
  color: #0d172a;
  cursor: pointer;
  display: inline-block;
  font-family: "Basier circle",-apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
  font-size: 1.1rem;
  font-weight: 600;
  line-height: 1;
  padding: 1rem 1.6rem;
  text-align: center;
  text-decoration: none #0d172a solid;
  text-decoration-thickness: auto;
  transition: all .1s cubic-bezier(.4, 0, .2, 1);
  box-shadow: 0px 1px 2px rgba(166, 175, 195, 0.25);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-81:hover {
  background-color: #1e293b;
  color: #fff;
}

@media (min-width: 768px) {
  .button-81 {
    font-size: 1.125rem;
    padding: 1rem 2rem;
  }
}

.button-78 {
  align-items: center;
  appearance: none;
  background-clip: padding-box;
  background-color: initial;
  background-image: none;
  border-style: none;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  flex-direction: row;
  flex-shrink: 0;
  font-family: Eina01,sans-serif;
  font-size: 16px;
  font-weight: 800;
  justify-content: center;
  line-height: 24px;
  margin: 0;
  min-height: 64px;
  outline: none;
  overflow: visible;
  padding: 19px 26px;
  pointer-events: auto;
  position: relative;
  text-align: center;
  text-decoration: none;
  text-transform: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  width: auto;
  word-break: keep-all;
  z-index: 0;
}

@media (min-width: 768px) {
  .button-78 {
    padding: 19px 32px;
  }
}

.button-78:before,
.button-78:after {
  border-radius: 80px;
}

.button-78:before {
  background-image: linear-gradient(92.83deg, #ff7426 0, #f93a13 100%);
  content: "";
  display: block;
  height: 100%;
  left: 0;
  overflow: hidden;
  position: absolute;
  top: 0;
  width: 100%;
  z-index: -2;
}

.button-78:after {
  background-color: initial;
  background-image: linear-gradient(#541a0f 0, #0c0d0d 100%);
  bottom: 4px;
  content: "";
  display: block;
  left: 4px;
  overflow: hidden;
  position: absolute;
  right: 4px;
  top: 4px;
  transition: all 100ms ease-out;
  z-index: -1;
}

.button-78:hover:not(:disabled):before {
  background: linear-gradient(92.83deg, rgb(255, 116, 38) 0%, rgb(249, 58, 19) 100%);
}

.button-78:hover:not(:disabled):after {
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
  transition-timing-function: ease-in;
  opacity: 0;
}

.button-78:active:not(:disabled) {
  color: #ccc;
}

.button-78:active:not(:disabled):before {
  background-image: linear-gradient(0deg, rgba(0, 0, 0, .2), rgba(0, 0, 0, .2)), linear-gradient(92.83deg, #ff7426 0, #f93a13 100%);
}

.button-78:active:not(:disabled):after {
  background-image: linear-gradient(#541a0f 0, #0c0d0d 100%);
  bottom: 4px;
  left: 4px;
  right: 4px;
  top: 4px;
}

.button-78:disabled {
  cursor: default;
  opacity: .24;
}
    </style>
@endsection