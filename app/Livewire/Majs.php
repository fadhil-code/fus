<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\allmajors;
class Majs extends Component
{
    use WithPagination;
 public string $search = '';
 public  $did = -1;

    public function render()
    {
        $query = allmajors::query();
        if ($this->search) {
            $query
            ->where('did', '=', "{$this->did}")
            ->where('mname', 'like', "%{$this->search}%");
        }
        else
        {
         $query
         ->where('did', '=', "{$this->did}");
        }
        return view('livewire.majs', [
            'allmajors' => $query->paginate(5)
        ]);

    }
    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }
}
