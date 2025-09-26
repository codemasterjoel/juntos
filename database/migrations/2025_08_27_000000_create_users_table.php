<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Pais;


class CreateUsersTable extends Migration
{
    use HasFactory, HasRoles;
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('cedula')->unique();
            $table->string('nombre');
            $table->string('tlf_contacto')->nullable();
            $table->string('tlf_emergencia')->nullable();
            $table->foreignId('genero_id')->nullable()->references('id')->on('generos')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('sexo_id')->nullable()->references('id')->on('sexos')->nullOnDelete()->cascadeOnUpdate();
            $table->date('fecha_nac');
            $table->Integer('edad');
            
            $table->Integer('cedula_representante')->nullable();
            $table->string('nombre_representante')->nullable();
            $table->string('tlf_representante')->nullable();
            
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            $table->foreignIdFor(Pais::class)->nullable()->references('id')->on('pais')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('estado_id')->nullable()->references('id')->on('estados')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('municipio_id')->nullable()->references('id')->on('municipios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('parroquia_id')->nullable()->references('id')->on('parroquias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('comuna_id')->nullable()->references('id')->on('comunas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('consejo_comunal_id')->nullable()->references('id')->on('consejo_comunals')->onDelete('cascade')->onUpdate('cascade');
            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('direccion')->nullable();

            $table->foreignId('entero_id')->nullable()->references('id')->on('enteros')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('modalidad_id')->nullable()->references('id')->on('modalidads')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('motivo_id')->nullable()->references('id')->on('motivos')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('atencion_psicologica')->default(false);
            $table->boolean('trastorno_psicologico')->default(false);

            $table->boolean('is_active')->default(true);
            $table->foreignId('especializacion_id')->nullable()->references('id')->on('especializacions')->nullOnDelete()->cascadeOnUpdate();
            $table->string('role')->default('paciente'); // 'admin', 'doctor', 'paciente'
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
