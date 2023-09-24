<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class student_main_det extends Model
{
    use HasFactory,Sortable;
    protected $table="student_main_det";

    protected $fillable = [
        'id',
        'stid',
        'sex',
        'bd',
        'photo',
        'adduid',
    ];
    public $sortable = ['id','sex','bd'];
    public function students(){
        return $this->hasOne('App\Models\students','id','stid');
    }
}
