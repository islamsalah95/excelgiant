<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Editor extends Component
{
    public $value;  // For storing the editor content

    public function mount($value = '')
    {
        $this->value = $value;  // Set initial content if any
    }

    public function render()
    {
        return view('livewire.editor');
    }
}

