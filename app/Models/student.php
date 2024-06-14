<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable=['name','dob','photo'];
    function allcourse(){
        return $this->hasMany(Studentcourse::class,'student_id','id');
    }
    function course(){
        return $this->hasOne(Studentcourse::class,'student_id','id');
    }
    // function photos(){
    //     return $this->hasMany(product_media::class,'p_id','id');
    // }
}
