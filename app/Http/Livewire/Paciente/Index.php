<?php

namespace App\Http\Livewire\Paciente;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Especialista;

use Livewire\Component;

class Index extends Component
{
    public $especialistas, $especialista, $paciente_id;
    public function render()
    {
        $this->especialistas = Especialista::all();
        $pacientes = Paciente::where('especialista_id', null)->get();
        return view('livewire.paciente.index', compact('pacientes'));
    }
    public function asignarEspecialista($id)
    {
        $this->paciente_id = $id;
    }
    public function guardar()
    {
            $paciente = Paciente::find($this->paciente_id);
            $paciente->especialista_id = $this->especialista;
            $paciente->update();
    }
}
