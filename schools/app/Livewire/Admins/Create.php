<?php

namespace App\Livewire\Admins;

use App\Models\User;
use Livewire\Component;
use App\Mail\Admin\SendPassword;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Create extends Component
{

    public $name_ar = '';
    public $name_en = '';
    public $email = '';
    public $role = '';


    protected $rules = [
        'name_ar' => 'required|string|max:255',
        'name_en' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'role' => 'required|exists:roles,name',
    ];

    public function submit()
    {
        $this->validate();

        $password= 123456;
        
        $admin = User::create([
            'name' => json_encode(['ar' => $this->name_ar, 'en' => $this->name_en], JSON_UNESCAPED_UNICODE),
            'email' => $this->email,
            'status' => 1,
            'password' => Hash::make($password)
        ]);

        Mail::to($admin->email)->send(new SendPassword($password ,$admin ));

        $admin->assignRole($this->role);

        session()->flash('message', __('share.message.create'));

        return redirectLive('admins');
    }


    public function render()
    {
        return view('livewire.admins.create', [
            'roles' => Role::all()->pluck('name', 'id')
        ]);
    }
}
