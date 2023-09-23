<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class subjects extends Model
{
    use HasFactory,Sortable;
    protected $fillable = [
        'spid',
        'subname',
        'units',
        'adduid',

    ];
    public $sortable = ['id','allmajors.mname','allmajors.mname2','subname','units'];

    public function allmajors(){
        return $this->hasOne('App\Models\allmajors','id','spid');
    }
    public function majors()
    {
        return $this->belongsTo('App\Models\allmajors');
    }
}
