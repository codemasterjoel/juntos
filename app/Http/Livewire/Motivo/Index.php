<?php

namespace App\Http\Livewire\Motivo;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Motivo;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $motivoNombre, $motivo;
    public function render()
    {
        $motivos = Motivo::orderBy('nombre', 'asc')->paginate(10);
        return view('livewire.motivo.index', [
            'motivos' => $motivos
        ]);
    }
    public function editar($id)
    {
        $this->motivo = Motivo::find($id);
        $this->motivoNombre = $this->motivo->nombre;
    }
    public function guardar()
    {
        if ($this->motivo) {
            $this->motivo->nombre = $this->motivoNombre;
            $this->motivo->update();
        } else {
            Motivo::create([
                'nombre' => $this->motivoNombre
            ]);
        }
        $this->motivoNombre = '';
        $this->motivo = null;
    }
    public function limpiarCampos()
    {
        $this->motivoNombre = '';
        $this->motivo = null;
    }
}
