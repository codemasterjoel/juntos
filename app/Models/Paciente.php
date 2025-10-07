<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'cedula',
        'nombre',
        'tlf_contacto',
        'tlf_emergencia',
        'genero_id',
        'sexo_id',
        'fecha_nac',
        'edad',
        'cedula_representante',
        'nombre_representante',
        'tlf_representante',
        'pais_id',
        'estado_id',
        'municipio_id',
        'parroquia_id',
        'comuna_id',
        'consejo_comunal_id',
        'direccion',
        'entero_id',
        'modalidad_id',
        'motivo_id',
        'atencion_psicologica',
        'trastorno_psicosocial',
        'is_active',
        'role',
        'file',
        'foto',
        'especialista_id',
    ];

    
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }
    public function comuna()
    {
        return $this->belongsTo(Comuna::class);
    }
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id', 'id');
    }
    public function consejo_comunal()
    {
        return $this->belongsTo(ConsejoComunal::class);
    }
    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
    public function sexo()
    {
        return $this->belongsTo(Sexo::class);
    }
}
