<?php

namespace App\Http\Livewire\Usuario;

use Livewire\Component;
use App\Models\User;

class Index extends Component
{
    public $users;

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.usuario.index');
    }
}
