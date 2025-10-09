<?php

namespace App\Http\Livewire\Perfil;
use App\Models\Especializacion;
use Livewire\WithFileUploads;
use App\Models\User;
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
use App\Models\Paciente;
use App\Models\Especialista;

use Livewire\Component;

class Index extends Component
{
    public User $user;
    use WithFileUploads;
    public $estados, $municipios, $parroquias, $comunas, $centros, $consejoComunales, $paises, $sexos, $generos, $enteros, $motivos = null;
    public $estado, $municipio, $parroquia, $comuna, $consejoComunal, $pais = null;
    public $cedula, $nombre, $tlf_contacto, $tlf_emergencia, $edad, $genero, $sexo, $fechaNac, $cedula_representante, $tlf_representante, $nombre_representante, $direccion, $comoSeEntero, $modalidad, $motivo, $atencion_psicologica, $trastorno_psicologico, $file, $foto, $especialidad = null;
    public $showSuccesNotification  = false;

    public $showDemoNotification = false;
    
    protected $rules = [
        'user.name' => 'max:40|min:3',
        'user.email' => 'email:rfc,dns',
        'user.phone' => 'max:10',
        'user.about' => 'max:200',
        'user.location' => 'min:3'
    ];

    public function mount() { 
        if (auth()->user()->role('admin') || auth()->user()->role('especialista')) {
            $this->user = auth()->user();
                $this->cedula = $this->user->especialista->cedula;
                $this->nombre = $this->user->especialista->nombre;
                $this->tlf_contacto = $this->user->especialista->tlf_contacto;
                $this->tlf_emergencia = $this->user->especialista->tlf_emergencia;
                $this->genero = $this->user->especialista->genero_id;
                $this->sexo = $this->user->especialista->sexo_id;
                $this->fechaNac = $this->user->especialista->fecha_nac;
                $this->edad = $this->user->especialista->edad;
                $this->cedula_representante = $this->user->especialista->cedula_representante;
                $this->nombre_representante = $this->user->especialista->nombre_representante;
                $this->tlf_representante = $this->user->especialista->tlf_representante;
                $this->pais = $this->user->especialista->pais_id;
                $this->estado = $this->user->especialista->estado_id;
                $this->municipios = Municipio::where('estado_id', $this->estado)->get();
                $this->municipio = $this->user->especialista->municipio_id;
                $this->parroquias = Parroquia::where('municipio_id', $this->municipio)->get();
                $this->parroquia = $this->user->especialista->parroquia_id;
                $this->comunas = Comuna::where('parroquia_id', $this->parroquia)->get();
                $this->comuna = $this->user->especialista->comuna_id;
                $this->consejoComunal = $this->user->especialista->consejo_comunal_id;
                $this->consejoComunales = ConsejoComunal::where('comuna_id', $this->comuna)->get();
                $this->direccion = $this->user->especialista->direccion;
                $this->comoSeEntero = $this->user->especialista->entero_id;
                $this->modalidad = $this->user->especialista->modalidad_id;
                $this->motivo = $this->user->especialista->motivo_id;
                $this->atencion_psicologica = $this->user->especialista->atencion_psicologica;
                $this->trastorno_psicologico = $this->user->especialista->trastorno_psicologico;
                $this->file = $this->user->especialista->file;
                $this->foto = $this->user->especialista->foto;
                $this->especialidad = $this->user->especialista->especializacion_id;
        } else {
            $this->user = auth()->user();
                $this->cedula = $this->user->paciente->cedula;
                $this->nombre = $this->user->paciente->nombre;
                $this->tlf_contacto = $this->user->paciente->tlf_contacto;
                $this->tlf_emergencia = $this->user->paciente->tlf_emergencia;
                $this->genero = $this->user->paciente->genero_id;
                $this->sexo = $this->user->paciente->sexo_id;
                $this->fechaNac = $this->user->paciente->fecha_nac;
                $this->edad = $this->user->paciente->edad;
                $this->cedula_representante = $this->user->paciente->cedula_representante;
                $this->nombre_representante = $this->user->paciente->nombre_representante;
                $this->tlf_representante = $this->user->paciente->tlf_representante;
                $this->pais = $this->user->paciente->pais_id;
                $this->estado = $this->user->paciente->estado_id;
                $this->municipios = Municipio::where('estado_id', $this->estado)->get();
                $this->municipio = $this->user->paciente->municipio_id;
                $this->parroquias = Parroquia::where('municipio_id', $this->municipio)->get();
                $this->parroquia = $this->user->paciente->parroquia_id;
                $this->comunas = Comuna::where('parroquia_id', $this->parroquia)->get();
                $this->comuna = $this->user->paciente->comuna_id;
                $this->consejoComunal = $this->user->paciente->consejo_comunal_id;
                $this->consejoComunales = ConsejoComunal::where('comuna_id', $this->comuna)->get();
                $this->direccion = $this->user->paciente->direccion;
                $this->comoSeEntero = $this->user->paciente->entero_id;
                $this->modalidad = $this->user->paciente->modalidad_id;
                $this->motivo = $this->user->paciente->motivo_id;
                $this->atencion_psicologica = $this->user->paciente->atencion_psicologica;
                $this->trastorno_psicologico = $this->user->paciente->trastorno_psicologico;
                $this->file = $this->user->paciente->file;
                $this->foto = $this->user->paciente->foto;
        }
    }

    public function save() {
        if(env('IS_DEMO')) {
           $this->showDemoNotification = true;
        } else {
            $this->validate();
            $this->user->save();
            $this->showSuccesNotification = true;
        }
    }
    public function render()
    {
        $this->estados = Estado::all();
        $this->paises = Pais::all();
        $this->generos = Genero::all();
        $this->sexos = Sexo::all();
        $this->enteros = Entero::all();
        $this->motivos = Motivo::all();
        $this->especialidades = Especializacion::all();
        return view('livewire.perfil.index');
    }
}
