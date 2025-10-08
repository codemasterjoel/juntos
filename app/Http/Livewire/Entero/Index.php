<?php

namespace App\Http\Livewire\Entero;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Entero;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $enteroNombre, $entero;

    public function render()
    {
        $enteros = Entero::orderBy('nombre', 'asc')->paginate(10);
        return view('livewire.entero.index', [
            'enteros' => $enteros
        ]);
    }
    public function editar($id)
    {
        $this->entero = Entero::find($id);
        $this->enteroNombre = $this->entero->nombre;
    }
    public function guardar()
    {
        if ($this->entero) {
            $this->entero->nombre = $this->enteroNombre;
            $this->entero->update();
        } else {
            Entero::create([
                'nombre' => $this->enteroNombre
            ]);
        }
        $this->enteroNombre = '';
        $this->entero = null;
    }
    public function limpiarCampos()
    {
        $this->enteroNombre = '';
        $this->entero = null;
    }
}
