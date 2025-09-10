<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comuna;

class ConsejoComunal extends Model
{
    use HasFactory;

    protected $fillable = [
        'comuna_id',
        'nombre',
    ];

    public function comuna()
    {
        return $this->belongsTo(Comuna::class);
    }
}
