<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\students;
class Livstudents extends Component
{
    use WithPagination;
    public string $search = '';
    public  $did = -1;
    public function render()
    {
        $query = students::query();
        if ($this->search) {
            $query
            ->where('did', '=', "{$this->did}")
            ->where('stname', 'like', "%{$this->search}%");
        }
        else
        {
         $query
         ->where('did', '=', "{$this->did}");
        }
        return view('livewire.livstudents', [
            'students' => $query->paginate(5)
        ]);
    }
    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }
}
