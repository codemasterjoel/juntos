<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public function mount()
    {

    }

    public function render() 
    {
        $user = \Auth::user();
        if ($user->hasRole('admin')) {
            return view('livewire.admin.dashboard');
        } elseif ($user->hasRole('doctor')) {
            return view('livewire.doctor.dashboard');
        }
        return view('livewire.paciente.dashboard');
    }
}
