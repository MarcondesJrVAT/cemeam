<?php

namespace App\Livewire\Admin\Acl\Permissions;

use App\Models\Permission;
use Illuminate\View\View;
use Livewire\Component;

class PermissionsTable extends Component
{
    public string $search = '';

    protected $listeners = ['permissionAdded' => '$refresh', 'permissionUpdated' => '$refresh', 'permissionDeleted' => '$refresh'];

    public function searchPermissions(string $search): void
    {
        $this->search = $search;
    }

    public function render(): View
    {
        $permissions = Permission::query()
            ->whereAny(['name', 'slug'], 'LIKE', "%{$this->search}%")
            ->orderByDesc('created_at')
            ->paginate(10);
        return view('livewire.admin.acl.permissions.permissions-table', compact('permissions'));
    }
}
