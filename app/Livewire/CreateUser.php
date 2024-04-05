<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class CreateUser extends ModalComponent
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

    public function render(): View
    {
        return view('livewire.create-user');
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
