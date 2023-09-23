<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\departments;
use App\Models\universities;

class Deps extends Component
{
 public $departments=[];
 public $universities=[];
    
    public $unid;
    public function render()
    {
        
        return view('livewire.deps');
    }
    public function mount(){
        $this->universities=universities::all();
    }
    public function finddeps()
    {
       // sleep(1);
        if ($this->unid != '-1')
   { $this->departments= departments::where('unid',$this->unid)->get();}
        
    }
}
