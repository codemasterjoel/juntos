<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
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

class SignUp extends Component
{
    use WithFileUploads;
    public $estados, $municipios, $parroquias, $comunas, $centros, $consejoComunales, $paises, $sexos, $generos, $enteros, $motivos = null;
    public $estado, $municipio, $parroquia, $comuna, $consejoComunal, $pais = null;
    public $cedula, $nombre, $tlf_contacto, $tlf_emergencia, $edad, $genero, $sexo, $fechaNac, $cedula_representante, $tlf_representante, $nombre_representante, $direccion, $comoSeEntero, $modalidad, $motivo, $atencion_psicologica, $trastorno_psicologico, $file, $foto = null;
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

        $this->fill(['email' => 'prueba@email.com', 'password' => '21246813', 'cedula' => '19491796', 'nombre' => 'Joel Zerpa', 'tlf_contacto' => '021214', 'tlf_emergencia'=>'02154545', 'genero'=>'2','name'=>'JoelZ',
                     'sexo'=>'2', 'fechaNac'=>'1990-10-10', 'edad'=>'35', 'estado'=>'1', 'municipio'=>'101', 'parroquia'=>'10101', 'comuna'=>'1541', 'consejoComunal'=>'14257', 'direccion'=>'calle 10', 'comoSeEntero'=>'1', 'modalidad'=>'1', 'motivo'=>'1', 'atencion_psicologica'=>'1', 'trastorno_psicologico'=>'1']);
        $this->pais = "VE";
    }
    public function register() {
        $this->validate();
        if ($this->edad >= 18 ) {
            $this->cedula_representante = null;
            $this->nombre_representante = null;
            $this->tlf_representante = null;
        }
        
        $file = $this->file->store('cedula', 'public_path');
        $paciente = Paciente::create([
            'file' => $file,
            'cedula' => $this->cedula,
            'nombre' => $this->nombre,
            'tlf_contacto' => $this->tlf_contacto,
            'tlf_emergencia' => $this->tlf_emergencia,
            'genero_id' => $this->genero,
            'sexo_id' => $this->sexo,
            'fecha_nac' => $this->fechaNac,
            'edad' => $this->edad,
            'cedula_representante' => $this->cedula_representante,
            'nombre_representante' => $this->nombre_representante,
            'tlf_representante' => $this->tlf_representante,
            'pais_id' => $this->pais,
            'estado_id' => $this->estado,
            'municipio_id' => $this->municipio,
            'parroquia_id' => $this->parroquia,
            'comuna_id' => $this->comuna,
            'consejo_comunal_id' => $this->consejoComunal,
            'direccion' => $this->direccion,
            'entero_id' => $this->comoSeEntero,
            'modalidad_id' => $this->modalidad,
            'motivo_id' => $this->motivo,
            'atencion_psicologica' => $this->atencion_psicologica,
            'trastorno_psicologico' => $this->trastorno_psicologico,
            'is_active' => true,
        ])->asignRole();

        $user = User::create([
            'paciente_id' => $paciente->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
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
        $this->enteros = Entero::all();
        $this->motivos = Motivo::all();
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
    public function updatedFechaNac($value)
    {
        $this->edad = Carbon::parse($value)->age;
    }
}
