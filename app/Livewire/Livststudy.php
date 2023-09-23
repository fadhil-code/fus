<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\studentstudy;
class Livststudy extends Component
{
    use WithPagination;
    public string $search = '';
    public  $stid = -1;
    public  $stname = '';
    public function render()
    {
        $query = studentstudy::query();
       
         $query
         ->where('stid', '=', "{$this->stid}");
        return view('livewire.livststudy', [
            'studentstudy' => $query->paginate(5)
        ]);
    }
    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }
}
