<?php

namespace App\Livewire\Contacts;

use Livewire\Component;
use App\Models\Contacts;
use Livewire\WithPagination;


class Index extends Component
{

    use WithPagination;

    public $search;
    public $select = 10; 


    public function delete($id)
    {
        Contacts::where('id', $id)->delete();
    

        $this->dispatch('del',message: __('share.message.delete') );


    }

    
    public function render()
    {
        if($this->search){
            $contacts = Contacts::search($this->search)->paginate($this->select);
        } else {
            $contacts = Contacts::paginate($this->select);
        }
    
        return view('livewire.contacts.index', [
            'contacts' => $contacts,
        ]);
    }
    
}
