<?php

namespace App\Http\Livewire\Comuna;
use Livewire\WithPagination;

use App\Models\Comuna;

use Livewire\Component;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $comunaNombre, $comuna;
    public function render()
    {
        $comunas = Comuna::orderBy('nombre', 'asc')->paginate(10);
        return view('livewire.comuna.index', [
            'comunas' => $comunas
        ]);
    }
    public function editar($id)
    {
        $this->comuna = Comuna::find($id);
        $this->comunaNombre = $this->comuna->nombre;
    }
    public function guardar()
    {
        if ($this->comuna) {
            $this->comuna->nombre = $this->comunaNombre;
            $this->comuna->update();
        } else {
            Comuna::create([
                'nombre' => $this->comunaNombre
            ]);
        }
        $this->comunaNombre = '';
        $this->comuna = null;
    }
    public function limpiarCampos()
    {
        $this->comunaNombre = '';
        $this->comuna = null;
    }
}
