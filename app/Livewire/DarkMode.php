<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class DarkMode extends Component
{
    public $darkMode = false;

    public function toggleDarkMode(): void
    {
        $this->darkMode = !$this->darkMode;

        if ($this->darkMode) {
            session()->put('dark-mode', true);
        } else {
            session()->forget('dark-mode');
        }
    }

    public function render(): View
    {
        return view('livewire.dark-mode');
    }
}
