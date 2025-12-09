<?php

namespace App\Http\Livewire\Doctor;

use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

use App\Models\Especialista;
use App\Models\User;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Comuna;
use App\Models\ConsejoComunal;
use App\Models\Pais;
use App\Models\Genero;
use App\Models\Sexo;
use App\Models\Paciente;
use App\Models\Especializacion;


class Index extends Component
{
    use WithFileUploads;
    public $estados, $municipios, $parroquias, $comunas, $centros, $consejoComunales, $paises, $sexos, $generos, $especialidades = null;
    public $estado, $municipio, $parroquia, $comuna, $consejoComunal, $pais = null;
    public $cedula, $nombre, $tlf_contacto, $tlf_emergencia, $edad, $genero, $sexo, $fechaNac, $direccion, $comoSeEntero, $modalidad, $file, $foto, $especialidad = null;
    public $especialistas, $pacientes, $user, $usuario, $idUsuario, $idEspecialista, $doctor, $name, $email, $password = null;

    public function mount()
    {
        $this->especialistas = User::where('role', 'especialista')->get();
        $this->pais = "VE";
    }
    public function render()
    {
        $this->estados = Estado::all();
        $this->paises = Pais::all();
        $this->generos = Genero::all();
        $this->sexos = Sexo::all();
        $this->especialidades = Especializacion::all();
        $this->doctor = User::where('role', '=', 'especialista')->get();
        return view('livewire.doctor.index');
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
    public function guardar()
    {
        $file = $this->file->store('cedula', 'public_path');
        $especialista = Especialista::updateOrCreate(['id' => $this->idEspecialista], [
            'file' => $file,
            'cedula' => $this->cedula,
            'nombre' => $this->nombre,
            'tlf_contacto' => $this->tlf_contacto,
            'tlf_emergencia' => $this->tlf_emergencia,
            'genero_id' => $this->genero,
            'sexo_id' => $this->sexo,
            'fecha_nac' => $this->fechaNac,
            'edad' => $this->edad,
            'pais_id' => $this->pais,
            'estado_id' => $this->estado,
            'municipio_id' => $this->municipio,
            'parroquia_id' => $this->parroquia,
            'comuna_id' => $this->comuna,
            'consejo_comunal_id' => $this->consejoComunal,
            'direccion' => $this->direccion,
            'especializacion_id' => $this->especialidad,
        ]);

        $user = User::updateOrCreate(['id' => $this->idUsuario], [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'especialista_id' => $especialista->id,
            'role' => 'especialista',
        ])->assignRole('especialista');

        session()->flash('message', 'Doctor registrado exitosamente.');
        return redirect()->to('/doctor');

    }
    public function limpiarCampos()
    {
        $this->estado = null;
        $this->municipio = null;
        $this->parroquia = null;
        $this->estados = null;
        $this->municipios = null;
        $this->parroquias = null;
        $this->comunas = null;
        $this->consejoComunales = null;
        $this->comuna = null;
        $this->consejoComunal = null;
        $this->pais = "VE";
        $this->cedula = null;
        $this->nombre = null;
        $this->tlf_contacto = null;
        $this->tlf_emergencia = null;
        $this->edad = null;
        $this->genero = null;
        $this->sexo = null;
        $this->fechaNac = null;
        $this->direccion = null;
        $this->comoSeEntero = null;
        $this->modalidad = null;
        $this->file = null;
        $this->foto = null;
        $this->especialidad = null;
        $this->idEspecialista = null;
    }
    public function verPacientes($id)
    {
        $this->pacientes = Paciente::where('especialista_id', $id)->get();
    }
    public function editarEspecialista($id)
    {
        //dd($id);
        $this->usuario = User::where('id', $id)->get()->first();
        //dd( $this->usuario );
        $this->idEspecialista = $this->usuario->especialista->id;
        $this->cedula = $this->usuario->especialista->cedula;
        $this->nombre = $this->usuario->especialista->nombre;
        $this->tlf_contacto = $this->usuario->especialista->tlf_contacto;
        $this->tlf_emergencia = $this->usuario->especialista->tlf_emergencia;
        $this->genero = $this->usuario->especialista->genero_id;
        $this->sexo = $this->usuario->especialista->sexo_id;
        $this->fechaNac = $this->usuario->especialista->fecha_nac;
        $this->direccion = $this->usuario->especialista->direccion;
        $this->especialidad = $this->usuario->especialista->especializacion_id;
        $this->estado = $this->usuario->especialista->estado_id;
        $this->municipio = $this->usuario->especialista->municipio_id;
        $this->parroquia = $this->usuario->especialista->parroquia_id;
        $this->comuna = $this->usuario->especialista->comuna_id;
        $this->consejoComunal = $this->usuario->especialista->consejo_comunal_id;
        $this->pais = $this->usuario->especialista->pais_id;
        $this->edad = Carbon::parse( $this->usuario->especialista->fecha_nac )->age;
        $this->municipios = Municipio::where('estado_id', $this->estado)->get();
        $this->parroquias = Parroquia::where('municipio_id', $this->municipio)->get();
        $this->comunas = Comuna::where('parroquia_id', $this->parroquia)->get();
        $this->consejoComunales = ConsejoComunal::where('comuna_id', $this->comuna)->get();
        $this->file = $this->usuario->especialista->file;
    }
}