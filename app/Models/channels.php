<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class channels extends Model
{
    use HasFactory,Sortable;
    protected $fillable = [
        'chname',
        'adduid',

    ];
    public $sortable = ['id','chname'];

}
