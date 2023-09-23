<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class lecturerss extends Model
{
    protected $table="lecturerss";

    use HasFactory,Sortable;
    protected $fillable = [
        'did',
        'lecname',
        'leclakab',
        'photo',
        'adduid',

    ];
    public $sortable = ['id','lecname','leclakab','departments.dname'];

    public function departments(){
        return $this->hasOne('App\Models\departments','id','did');
    }

    public function deps()
    {
        return $this->belongsTo('App\Models\departments');
    }

}


