<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class resyear extends Model
{
    use HasFactory,Sortable;
    protected $table="resyear";

    protected $fillable = [
        'id',
        'ssid',
        'syeardate',
        'adduid',
    ];
    public $sortable = ['id','syeardate'];
    public function studentstudy(){
        return $this->hasOne('App\Models\studentstudy','id','ssid');
    }
}
