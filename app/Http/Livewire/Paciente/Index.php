<?php

namespace App\Http\Livewire\Paciente;
use App\Models\User;

use Livewire\Component;

class Index extends Component
{
    public $especialistas, $cedula, $paciente_id;
    public function render()
    {
        $this->especialistas = User::where('role','especialista')->get();
        $pacientes = User::where('role','paciente')
                            ->where('especialista_id', null)->get();
        return view('livewire.paciente.index', compact('pacientes'));
    }
    public function asignarEspecialista($id)
    {
        $this->paciente_id = $id;
    }
    public function guardar()
    {
            $paciente = User::find($this->paciente_id);

            $paciente->especialista_id = $this->cedula;
            $paciente->update();
    }
}
