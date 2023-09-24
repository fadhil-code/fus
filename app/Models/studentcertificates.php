<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class studentcertificates extends Model
{
    use HasFactory,Sortable;
    protected $fillable = [
        'id',
        'stid',
        'title',
        'inside',
        'taeed',
        'taeeddate',
        'av',
        'qu',
        'karar',
        'karardate',
        'adduid',
    ];

    public $sortable = ['id','title','inside','taeed','taeeddate','av','qu','karar','karardate'];
    public function students(){
        return $this->hasOne('App\Models\students','id','stid');
    }

}


