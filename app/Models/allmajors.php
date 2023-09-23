<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class allmajors extends Model
{
    use HasFactory,Sortable;
    protected $fillable = [
        'mname',
        'mname2',
        'did',
        'stdid',
        'adduid',

    ];
    public $sortable = ['id','mname','mname2','departments.dname','studies.studyname'];

    public function departments(){
        return $this->hasOne('App\Models\departments','id','did');
    }
    public function studies(){
        return $this->hasOne('App\Models\studies','id','stdid');
    }
    public function deps()
    {
        return $this->belongsTo('App\Models\departments');
    }
    
    public function subjects(){
        return $this->hasMany('App\Models\subjects','spid','id');
    }
}
