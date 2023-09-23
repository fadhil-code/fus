<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class discussion extends Model
{
    use HasFactory,Sortable;
    protected $table="discussion";

    protected $fillable = [
        'id',
    'rsid',
    'dicdate',
    'edits',
    'editdone',
    'adduid',
];
public $sortable = ['id','dicdate','edits','editdone'];
public function resyear(){
    return $this->hasOne('App\Models\resyear','id','rsid');
}
}

