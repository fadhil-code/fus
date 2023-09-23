<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class studies extends Model
{
    use HasFactory,Sortable;
    protected $fillable = [
        'studyname',
        'adduid',

    ];
    public $sortable = ['id','studyname'];

}
