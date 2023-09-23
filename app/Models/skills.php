<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class skills extends Model
{
    use HasFactory,Sortable;
    protected $fillable = [
        'id',
        'rsid',
        'skname',
        'sknotes',
        'skdate',
        'points',
        'adduid',
    ];
    public $sortable = ['id','skname','sknotes','skdate','points'];
    public function resyear(){
        return $this->hasOne('App\Models\resyear','id','rsid');
    }
}
