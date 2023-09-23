<?php

namespace App\Livewire;
use App\Models\universities;

use Livewire\Component;

class Unes extends Component
{
    public $counts = 0;
 public $universities='';
    public function getuncount()
    {
    $this->counts= universities::count();

    }
    public function render()
    {
    //$this->counts= universities::count();
    $this->universities= universities::all();
        return view('livewire.unes');
    }

}
