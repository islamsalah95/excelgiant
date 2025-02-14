<?php

namespace App\Livewire\FrontEnd;

use Livewire\Component;
use App\Models\Contacts;

class Contact extends Component
{


    public $name = '';
    public $phone = '';

    public $email = '';
    public $company = '';
    public $position = '';
    public $city = '';

    public $message = '';



    protected $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'email' => 'required|email|max:255' ,
        'company' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'message' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        Contacts::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'company' => $this->company,
            'position' => $this->position,
            'city' => $this->city,
            'message' => $this->message,
        ]);
        
        
        session()->flash('message', __('share.message.create'));
        
        flash()->addSuccess(__('share.message.create'));

        $this->name = '';
        $this->phone = '';
        $this->phone = '';
        $this->message = '';
        $this->position = '';
        $this->city = '';
    }

    public function render()
    {
        return view('livewire.front-end.contact');
    }
}
