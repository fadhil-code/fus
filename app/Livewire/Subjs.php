<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\subjects;
use App\Models\departments;
class Subjs extends Component
{
    use WithPagination;
 public string $search = '';
 public  $did = -1;
    public function render()
    {
        $departments= departments::find($this->did);
        if ($this->search) {
        $subjects=$departments->subjects()->sortable()            
            ->where('subname', 'like', "%{$this->search}%");
        }
        else
        {
            $subjects=$departments->subjects()->sortable();

        }
        return view('livewire.subjs', [
            'subjects' => $subjects->paginate(5)
        ]);
    }
    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }
}
