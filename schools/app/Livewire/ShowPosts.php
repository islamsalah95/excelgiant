<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Services;
use Livewire\WithPagination;

class ShowPosts extends Component
{

    use WithPagination;

    public $search;
    public $select = 5; 

    public function render()
    {
        $query = Services::where('status', '1');
    
        if ($this->search) {
            $query->where(function ($q) {
                $q->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(name, '$.ar'))   LIKE ?",   ['%' . $this->search . '%'])
                  ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(name, '$.en')) LIKE ?", ['%' . $this->search . '%'])
                  ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(slug, '$.ar')) LIKE ?", ['%' . $this->search . '%'])
                  ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(slug, '$.en')) LIKE ?", ['%' . $this->search . '%']);
            });
        }
    
        $services = $query->paginate($this->select);
    
        return view('livewire.show-posts', [
            'services' => $services
        ]);
    }
    public function updatedSelect($value)
    {
        session()->flash('message', "You have selected $value items per page.");
    }
}
