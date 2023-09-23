<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supervisors extends Model
{
    use HasFactory;
    protected $fillable = [
        'ststudyid',
        'lecid',
        'supdate',
        'active',
        'adduid',

    ];
    public function studentstudy(){
        return $this->hasOne('App\Models\studentstudy','id','ststudyid');
    }
    public function lecturerss(){
        return $this->hasOne('App\Models\lecturerss','id','lecid');
    }
}


