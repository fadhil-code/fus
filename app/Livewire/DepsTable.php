<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\departments;

class DepsTable extends Component
{
 use WithPagination;
 public string $search = '';

 protected $queryString = ['search'];
    public $unid;
    public function render()
    {
        $query = departments::query();
        if ($this->search) {
            $query
            ->where('dname', 'like', "%{$this->search}%");
        }

        return view('livewire.deps-table', [
            'departments' => $query->paginate(5)
        ]);

    }
    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }
}
