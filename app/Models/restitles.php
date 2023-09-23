<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class restitles extends Model
{
    use HasFactory,Sortable;
    protected $fillable = [
        'id',
        'rsid',
        'stitle',
        'titledate',
        'adduid',
    ];
    public $sortable = ['id','stitle','titledate'];
    public function resyear(){
        return $this->hasOne('App\Models\resyear','id','rsid');
    }
}
