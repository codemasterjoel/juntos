<?php

namespace App\Http\Livewire\Especializacion;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Especializacion;

class Index extends Component
{    
    use WithPagination;
    public $especializacion, $especialidad;
    protected $paginationTheme = 'bootstrap';
    // public $especializaciones;

    public function render()
    {
        $especializaciones = Especializacion::query()->orderBy('nombre', 'Asc')->paginate(10);
        
        return view('livewire.especializacion.index', [
            'especializaciones' => $especializaciones
        ]);
    }
    public function editar($id)
    {
        $this->especialidad = Especializacion::find($id);
        $this->especializacion = $this->especialidad->nombre;
    }
    public function guardar()
    {
        if ($this->especialidad) {
            $this->especialidad->nombre = $this->especializacion;
            $this->especialidad->update();
        } else {
            Especializacion::create([
                'nombre' => $this->especializacion
            ]);
        }
        $this->especializacion = '';
        $this->especialidad = null;
    }
    public function limpiarCampos()
    {
        $this->especializacion = '';
        $this->especialidad = null;
    }
}
