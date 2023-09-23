<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentstudy extends Model
{
    use HasFactory;
    protected $table="studentstudy";

    protected $fillable = [
        'stid',
        'spid',
        'chid',
        'mobashara',
        'adduid',
        'state',
        'position',

    ];
    public function channels(){
        return $this->hasOne('App\Models\channels','id','chid');
    }
    public function allmajors(){
        return $this->hasOne('App\Models\allmajors','id','spid');
    }
    public function students(){
        return $this->hasOne('App\Models\students','id','stid');
    }
}
