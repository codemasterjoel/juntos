<?php

namespace App\Http\Livewire\Doctor;

use Livewire\Component;
use App\Models\User as Doctor;


class Index extends Component
{
    public $doctores;

    public function mount()
    {
        $this->doctores = Doctor::all();
    }

    public function render()
    {
        return view('livewire.doctor.index');
    }
}