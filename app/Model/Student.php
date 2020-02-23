<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['student_id','name','major_id','address','photo','email','password'];
    public function major(){
        return $this->belongsTo(Major::class);
    }
}
