<?php

namespace App\Livewire\Admin\Acl\Roles\Partials;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;

class CreateRole extends Component
{
    public bool $showModal = false;
    public string $name;

    public function toggleModal(): void
    {
        $this->resetValidation();
        $this->showModal = !$this->showModal;
    }

    public function render(): View
    {
        return view('livewire.admin.acl.roles.partials.create-role');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        $validatedData = [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ];

        Role::create($validatedData);

        session()->flash('success', 'Função Criada com Sucesso!');

        $this->toggleModal();

        return redirect()->route('admin.roles');
    }
}
