<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class superresearches extends Model
{
    use HasFactory,Sortable;
    protected $fillable = [
        'id',
        'researchid',
        'superid',
        'adduid',
    ];
    public function researches(){
        return $this->hasOne('App\Models\researches','id','researchid');
    }
    public function supervisors(){
        return $this->hasOne('App\Models\supervisors','id','superid');
    }
    public function researche()
    {
        return $this->belongsTo('App\Models\researches');
    }
}
