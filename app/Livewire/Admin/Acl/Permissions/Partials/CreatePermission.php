<?php

namespace App\Livewire\Admin\Acl\Permissions\Partials;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;

class CreatePermission extends Component
{
    public bool $showModal = false;
    public string $name = '';

    public function toggleModal(): void
    {
        $this->resetValidation();
        $this->showModal = !$this->showModal;
    }

    public function render(): View
    {
        return view('livewire.admin.acl.permissions.partials.create-permission');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
        ]);

        $validatedData = [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ];

        Permission::create($validatedData);

        session()->flash('success', 'Permissão Criada com Sucesso!');

        $this->toggleModal();

        return redirect()->route('admin.permissions');
    }
}
