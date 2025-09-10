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

class SignUp extends Component
{
    public $estados, $municipios, $parroquias, $comunas, $centros, $consejoComunales = null;
    public $estado, $municipio, $parroquia, $comuna, $consejoComunal = null;
    public $name = '';
    public $email = '';
    public $password = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email:rfc,dns|unique:users',
        'password' => 'required|min:6'
    ];

    public function mount() {
        if(auth()->user()){
            redirect('/dashboard');
        }
    }

    public function register() {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'estado_id' => $this->estado,
            'municipio_id' => $this->municipio,
            'parroquia_id' => $this->parroquia,
            'comuna_id' => $this->comuna,
            'consejo_comunal_id' => $this->consejoComunal
        ]);

        $user->assignRole('paciente');

        auth()->login($user);

        return redirect('/dashboard');
    }

    public function render()
    {
        $this->estados = Estado::all();
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
