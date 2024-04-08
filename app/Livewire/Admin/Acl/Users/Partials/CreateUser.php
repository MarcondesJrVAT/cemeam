<?php

namespace App\Livewire\Admin\Acl\Users\Partials;

use App\Models\User;
use Livewire\Component;

class CreateUser extends Component
{
    public $showModal = false;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function toggleModal(): void
    {
        $this->resetValidation();
        $this->showModal = !$this->showModal;
    }

    public function render()
    {
        return view('livewire.admin.acl.users.partials.create-user');
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        session()->flash('message', 'Usuário Criado com Sucesso.');

        $this->toggleModal();

        return redirect()->route('admin.users');
    }
}
