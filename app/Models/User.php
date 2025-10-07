<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    protected $guarded = [];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $fillable = [
        'name',
        'email',
        'password',
        'especialista_id',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function especializacion()
    {
        return $this->belongsTo(Especializacion::class);
    }
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
