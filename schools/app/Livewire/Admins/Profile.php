<?php

namespace App\Livewire\Admins;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    use WithFileUploads;

    public $name_ar = '';
    public $name_en = '';
    public $password = '';
    public $confirm_password = '';
    public $img='';

    public $admin='';

    protected $rules = [
        'name_ar' => 'required|string|max:255',
        'name_en' => 'required|string|max:255',
        'password' => 'nullable|string|min:6',
        'img' => 'nullable|image|max:10000',
    ];


    public function mount()
    {
        $admin = auth()->user();
        $admin = User::findOrFail($admin->id);
        $this->admin =  $admin;

        if ($admin) {
            $this->name_ar = json_decode($admin->name, true)['ar'] ?? '';
            $this->name_en = json_decode($admin->name, true)['en'] ?? '';
        }
    }

    public function submit()
    {
        $this->validate();

        $admin = auth()->user();

        // Update user details
        $admin = User::findOrFail($admin->id);
        $admin->update([
            'name' => json_encode(['ar' => $this->name_ar, 'en' => $this->name_en], JSON_UNESCAPED_UNICODE),
            'password' => $this->password ?  Hash::make($this->password) : $admin->password
        ]);

        if ($this->img) {
            uploadImage($admin, $this->img, 'profile_image');
        }

        // Flash success message
        session()->flash('message', __('Profile updated successfully.'));
        return redirectLive('admins');
    }


    public function render()
    {

        return view('livewire.admins.profile');
    }
}
