<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable=['name','fees','discount'];

    function allstudent(){
        return $this->hasMany(Studentcourse::class,'course_id','id');
    }
    function student(){
        return $this->hasOne(Studentcourse::class,'course_id','id');
    }
}
