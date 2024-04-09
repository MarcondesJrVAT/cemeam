<?php

namespace App\Livewire\Admin\Acl\Users\Partials;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class CreateUser extends Component
{
    public $showModal = false;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $roles = [];

    public function toggleModal(): void
    {
        $this->resetValidation();
        $this->showModal = !$this->showModal;
    }

    public function render()
    {
        $allRoles = Role::all();
        return view('livewire.admin.acl.users.partials.create-user', compact('allRoles'));
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'roles' => 'required|array|min:1',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $user->roles()->sync($this->roles);

        $this->reset([
            'name',
            'email',
            'password',
            'password_confirmation',
            'roles',
        ]);

        session()->flash('success', 'Usuário Criado com Sucesso.');

        $this->toggleModal();

        return redirect()->route('admin.users');
    }
}
