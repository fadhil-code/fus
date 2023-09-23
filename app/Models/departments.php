<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class departments extends Model
{
    use HasFactory,Sortable;
    protected $fillable = [
        'dname',
        'unid',
        'adduid',

    ];
    public $sortable = ['id','universities.uname','dname'];

    public function universities(){
        return $this->hasOne('App\Models\universities','id','unid');
    }
    public function unies() {
        return $this->belongsTo('App\Models\universities');
    }
    public function lecturerss(){
        return $this->hasMany('App\Models\lecturerss','did','id');
    }
    public function allmajors(){
        return $this->hasMany('App\Models\allmajors','did','id');
    }
    public function subjects()
    {
        return $this->hasManyThrough('App\Models\subjects', 'App\Models\allmajors','did','spid','id','id');
    }
}
