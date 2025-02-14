<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncAdminRoleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $admin;
    protected $role;

    /**
     * Create a new job instance.
     *
     * @param \App\Models\User $admin
     * @param string $role
     */
    public function __construct(User $admin, string $role)
    {
        $this->admin = $admin;
        $this->role = $role;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Sync the role to the admin
        $this->admin->syncRoles([$this->role]);
    }
}
