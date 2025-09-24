<?php

namespace App\Http\Livewire\Paciente;
use App\Models\User;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $pacientes = User::where('role','paciente')->get();
        return view('livewire.paciente.index', compact('pacientes'));
    }
}
