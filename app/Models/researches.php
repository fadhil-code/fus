<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class researches extends Model
{
    use HasFactory,Sortable;
    protected $fillable = [
        'id',
        'rsid',
        'rtitle',
        'rtstae',
        'uploadhdate',
        'publishdate',
        'etemad',
        'adduid',
    ];
    public $sortable = ['id','rtitle','rtstae','uploadhdate','publishdate','etemad'];
    public function resyear(){
        return $this->hasOne('App\Models\resyear','id','rsid');
    }
    public function superresearches(){
        return $this->hasMany('App\Models\superresearches','researchid','id');
    }
}
