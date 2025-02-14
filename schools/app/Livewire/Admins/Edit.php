<?php

namespace App\Livewire\Admins;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Mail\Admin\SendPassword;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Edit extends Component
{

    public $admin = '';

    public $admin_id = '';

    public $name = '';
    public $email = '';
    public $select_role = '';
    public $status = '';

    public $password = '';


    public $reset_password = '0';


    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|exists:employee,email',
        'select_role' => 'required|exists:roles,name',
        'reset_password' => "required|in:0,1",
    ];

    public function mount($admin = null)
    {
        if ($admin) {
            $this->admin = $admin;
            $this->admin_id =  $admin->id;
            $this->name = $admin->name ?? $admin->email;
            $this->email =  $admin->email;
            $this->select_role = $admin->getRoleNames()[0]??'';
            $this->status =  $admin->status ?? '';
            $this->password =  $admin->password;
        }
    }

    public function submit()
    {
        // Validate the input data
        $this->validate();

        // Generate a random password if reset_password is set
        $password = $this->reset_password == '1' ? Str::random(8) : $this->password;

        // Use a transaction to ensure data integrity
        DB::transaction(function () use ($password) {
            // Update the admin user
            $admin = User::findOrFail($this->admin_id);
            $admin->update([
                'name' => $this->name,
                'email' => $this->email,
                'status' => 1,
                'password' => Hash::make($password)
            ]);

            // Sync roles
            $admin->syncRoles([$this->select_role]);



            // Send email with the new password if it was reset
            if ($this->reset_password == '1') {
                Mail::to($this->email)->send(new SendPassword($password, $admin));
            }
        });

        // Flash a success message to the session
        session()->flash('message', __('share.message.update'));

        // Redirect to the admins page
        return redirectLive('admins');
    }

    public function render()
    {

        return view('livewire.admins.edit', [
            'roles' => Role::all()->pluck('name')
        ]);
    }
}
