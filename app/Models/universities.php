<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
class universities extends Model
{
    use HasFactory,Sortable;
    protected $fillable = [
        'uname',
        'adduid',

    ];
    public $sortable = ['id','uname'];
    public function deps() {
        return $this->hasMany('App\Models\departments','unid','id');
    }
    public function lecturerss()
    {
        return $this->hasManyThrough('App\Models\lecturerss', 'App\Models\departments','unid','did','id','id');
    }
    
    public function allmajors()
    {
        return $this->hasManyThrough('App\Models\allmajors', 'App\Models\departments','unid','did','id','id');
    }
    public function subjects()
    {
        return $this->hasManyThrough('App\Models\subjects', 'App\Models\allmajors','id','spid','did','id','App\Models\departments','unid','id');
    }
}
