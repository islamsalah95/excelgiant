<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Tabel extends Component
{
    use WithPagination;

    public $search;
    public $select = 10; // Default items per page

    public function render()
    {

        $query = Role::orderBy('id', 'DESC');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('id', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%');
            });
        }

        $data = $query->paginate($this->select);

        return view('livewire.role.tabel', compact('data'));
    }


}
