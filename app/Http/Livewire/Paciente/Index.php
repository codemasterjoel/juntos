<?php

namespace App\Http\Livewire\Paciente;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Especialista;
use Livewire\WithFileUploads;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Comuna;
use App\Models\ConsejoComunal;
use App\Models\Pais;
use App\Models\Genero;
use App\Models\Sexo;
use App\Models\Entero;
use App\Models\Motivo;

use Livewire\Component;

class Index extends Component
{
    public $especialistas, $especialista, $paciente_id, $pacientes, $paciente = null;
    public function render()
    {
        if (auth()->user()->role=='especialista') {
            $this->pacientes = Paciente::where('especialista_id', auth()->user()->especialista_id)->get();
            return view('livewire.paciente.indexDoctor');
        } elseif (auth()->user()->role=='admin') {
            $this->especialistas = Especialista::all();
            $this->pacientes = Paciente::where('especialista_id', null)->get();
            return view('livewire.paciente.index');
        }
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

    public function verPaciente($id)
    {
        $this->paciente = Paciente::find($id);
    }
    public function limpiarCampos()
    {
        $this->especialista = null;
        $this->paciente_id = null;
        $this->paciente = null;
    }
}
