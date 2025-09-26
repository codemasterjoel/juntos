<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Comuna;
use App\Models\ConsejoComunal;
use App\Models\Pais;
use App\Models\Genero;
use App\Models\Sexo;

class SignUp extends Component
{
    public $estados, $municipios, $parroquias, $comunas, $centros, $consejoComunales, $paises = null;
    public $estado, $municipio, $parroquia, $comuna, $consejoComunal, $pais = null;
    public $cedula, $nombre, $tlf_contacto, $tlf_emergencia, $genero, $sexo, $fecha_nac, $edad, $cedula_representante, $tlf_representante, $nombre_representante, $direccion, $entero, $modalidad, $motivo, $atencion_psicologica, $trastorno_psicologico = null;
    public $name = '';
    public $email = '';
    public $password = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email:rfc|unique:users',
        'password' => 'required|min:6'
    ];

    public function mount() {
        if(auth()->user()){
            redirect('/dashboard');
        }
    $this->pais = "VE";
    }

    public function register() {
        $this->validate();
        $user = User::create([
            'cedula' => $this->cedula,
            'nombre' => $this->nombre,
            'tlf_contacto' => $this->tlf_contacto,
            'tlf_emergencia' => $this->tlf_emergencia,
            'genero_id' => $this->genero,
            'sexo_id' => $this->sexo,
            'fecha_nac' => $this->fecha_nac,
            'edad' => $this->edad,
            'cedula_representante' => $this->cedula_representante,
            'tlf_representante' => $this->tlf_representante,
            'nombre_representante' => $this->nombre_representante,
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'pais_id' => $this->pais,
            'estado_id' => $this->estado,
            'municipio_id' => $this->municipio,
            'parroquia_id' => $this->parroquia,
            'comuna_id' => $this->comuna,
            'consejo_comunal_id' => $this->consejoComunal,
            'direccion' => $this->direccion,
            'entero_id' => $this->entero,
            'modalidad_id' => $this->modalidad,
            'motivo_id' => $this->motivo,
            'atencion_psicologica' => $this->atencion_psicologica,
            'trastorno_psicologico' => $this->trastorno_psicologico,
            'is_active' => true,
        ]);

        $user->assignRole('paciente');

        auth()->login($user);

        return redirect('/dashboard');
    }

    public function render()
    {
        $this->estados = Estado::all();
        $this->paises = Pais::all();
        $this->generos = Genero::all();
        $this->sexos = Sexo::all();
        return view('livewire.auth.sign-up');
    }
    public function updatedEstado($id)
    {
        $this->municipio = null;
        $this->parroquia = null;
        $this->comuna = null;
        $this->consejoComunal = null;
        $this->municipios = Municipio::where('estado_id', $id)->get();
    }
    public function updatedMunicipio($id)
    {
        $this->parroquia = null;
        $this->comuna = null;
        $this->consejoComunal = null;
        $this->parroquias = Parroquia::where('municipio_id', $id)->get();
    }
    public function updatedParroquia($id){
        $this->comuna = null;
        $this->consejoComunal = null;
        $this->comunas = Comuna::where('parroquia_id', $id)->get();
    }
    public function updatedComuna($id){
        $this->consejoComunal = null;
        $this->consejoComunales = ConsejoComunal::where('comuna_id', $id)->get();
    }
}
