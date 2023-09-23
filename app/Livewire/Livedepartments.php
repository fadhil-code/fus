<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\departments;
class Livedepartments extends Component
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
            ->where('unid', '=', "{$this->unid}")
            ->where('dname', 'like', "%{$this->search}%");
        }
        else
        {
            $query
            ->where('unid', '=', "{$this->unid}");  
        }

        return view('livewire.livedepartments', [
            'departments' => $query->paginate(5)
        ]);
    }
}
