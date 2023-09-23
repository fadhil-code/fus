<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
class Accounts extends Component
{
    public string $search = '';

    public  $unid = -1;
    protected $queryString = ['search'];
    public function render()
    {
        $query = User::query();
        if ($this->unid)
        
{        if ($this->search) {
            $query
            ->where('unid', '=', "{$this->unid}")
            ->where('fullname', 'like', "%{$this->search}%");
        }
        else
        {
            $query
            ->where('unid', '=', "{$this->unid}");
        }
    }

        return view('livewire.accounts', [
            'accounts' => $query->paginate(5)
        ]);
    }
    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }
}
