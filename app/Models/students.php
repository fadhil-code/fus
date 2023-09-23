<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class students extends Model
{
  use HasFactory,Sortable;

    protected $fillable = [
        'id',
        'did',
        'stname',
        'adduid',

    ];
    public $sortable = ['id','stname'];

    public function departments(){
        return $this->hasOne('App\Models\departments','id','did');
    }
}
