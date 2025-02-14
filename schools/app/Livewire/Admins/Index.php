<?php

namespace App\Livewire\Admins;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search;
    public $select = 10;

    public function delete($id)
    {
        $admin = User::find($id);
        deleteImage($admin, 'profile_image');
        $admin->delete();
        $this->dispatch('del', message: __('share.message.delete'));
    }
    public function render()
    {
        $query = User::whereIn('status', [1, 0])
            ->when($this->search, function ($q) {
                $q->where(function ($subQuery) {
                    $subQuery->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(name, '$.ar')) LIKE ?", ['%' . $this->search . '%'])
                        ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(name, '$.en')) LIKE ?", ['%' . $this->search . '%']);
                })
                    ->orWhereHas('roles', function ($roleQuery) {
                        $roleQuery->where('name', 'LIKE', '%' . $this->search . '%');
                    });
            });

        $admins = $query->paginate($this->select);

        return view('livewire.admins.index', [
            'admins' => $admins,
        ]);
    }
}
