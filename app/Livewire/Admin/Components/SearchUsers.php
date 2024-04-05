<?php

namespace App\Livewire\Admin\Components;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search = '';

    public function render(): View
    {
        $users = User::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->latest('created_at')
            ->paginate(10);
        return view('admin.acl.users.dashboard', compact('users'));
    }
}
