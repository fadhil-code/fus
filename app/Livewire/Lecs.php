<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\lecturerss;
class Lecs extends Component
{
    use WithPagination;
    public string $search = '';
    public  $did = -1;
    public function render()
    {
        $query = lecturerss::query();
        if ($this->search) {
            if($this->did>=1)
           { $query
            ->where('did', '=', "{$this->did}")
            ->where('lecname', 'like', "%{$this->search}%");
       } }
       else
       {
        $query
        ->where('did', '=', "{$this->did}");
       }

        return view('livewire.lecs', [
            'lecturerss' => $query->paginate(5)
        ]);
    }
    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }
}
