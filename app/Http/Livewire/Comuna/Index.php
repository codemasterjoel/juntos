<?php

namespace App\Http\Livewire\Comuna;
use Livewire\WithPagination;

use App\Models\Comuna;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;

use Livewire\Component;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $comunaNombre, $comuna;
    public $estados, $municipios, $parroquias;
    public $estado, $municipio, $parroquia, $id;
    public function render()
    {
        $this->estados = Estado::all();
        $comunas = Comuna::orderBy('nombre', 'asc')->paginate(10);
        return view('livewire.comuna.index', [
            'comunas' => $comunas
        ]);
    }
    public function editar($id)
    {
        $this->id = $id;
        $this->comuna = Comuna::find($id);
        $this->estado = $this->comuna->parroquia->municipio->estado->id;
        $this->municipio = $this->comuna->parroquia->municipio->id;
        $this->parroquia = $this->comuna->parroquia_id;
        $this->municipios = Municipio::where('estado_id', $this->estado)->get();
        $this->parroquias = Parroquia::where('municipio_id', $this->municipio)->get();
        $this->comunaNombre = $this->comuna->nombre;
    }
    public function guardar()
    {
         Comuna::updateOrCreate(['id' => $this->id],
            [
                'nombre' => $this->comunaNombre,
                'parroquia_id' => $this->parroquia,
            ]);
        // if ($this->comuna) {
        //     $this->comuna->nombre = $this->comunaNombre;
        //     $this->comuna->parroquia_id = $this->parroquia;
        //     $this->comuna->update();
        // } else {
        //     Comuna::create([
        //         'nombre' => $this->comunaNombre,
        //         'parroquia_id' => $this->parroquia,
        //     ]);
        // }
        $this->comunaNombre = '';
        $this->comuna = null;
    }
    public function limpiarCampos()
    {
        $this->comunaNombre = '';
        $this->comuna = null;
        $this->estado = null;
        $this->municipio = null;
        $this->parroquia = null;
        $this->municipios = null;
        $this->parroquias = null;
    }
    public function updatedEstado($id)
    {
        $this->municipio = null;
        $this->parroquia = null;
        $this->comuna = null;
        $this->municipios = Municipio::where('estado_id', $id)->get();
    }
    public function updatedMunicipio($id)
    {
        $this->parroquia = null;
        $this->comuna = null;
        $this->parroquias = Parroquia::where('municipio_id', $id)->get();
    }
    public function updatedParroquia($id){
        $this->comuna = null;
        $this->comunas = Comuna::where('parroquia_id', $id)->get();
    }
}
