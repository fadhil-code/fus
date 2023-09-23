<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\supervisors;
class Supers extends Component
{
    use WithPagination;
    public  $ststudyid = -1;
    public function render()
    {
        $query = supervisors::query();
       
         $query
         ->where('ststudyid', '=', "{$this->ststudyid}");
        return view('livewire.Supers', [
            'supervisors' => $query->paginate(5)
        ]);
    }
    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }
}
