<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pais;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('especialistas', function (Blueprint $table) {
            $table->id();

            $table->string('cedula')->unique();
            $table->string('nombre');
            $table->string('tlf_contacto')->nullable();
            $table->string('tlf_emergencia')->nullable();
            $table->foreignId('genero_id')->nullable()->references('id')->on('generos')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('sexo_id')->nullable()->references('id')->on('sexos')->nullOnDelete()->cascadeOnUpdate();
            $table->date('fecha_nac');
            $table->Integer('edad');

            $table->foreignIdFor(Pais::class)->nullable()->references('id')->on('pais')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('estado_id')->nullable()->references('id')->on('estados')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('municipio_id')->nullable()->references('id')->on('municipios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('parroquia_id')->nullable()->references('id')->on('parroquias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('comuna_id')->nullable()->references('id')->on('comunas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('consejo_comunal_id')->nullable()->references('id')->on('consejo_comunals')->onDelete('cascade')->onUpdate('cascade');
            $table->string('direccion')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('file')->nullable();
            $table->string('foto')->nullable();

            $table->foreignId('especializacion_id')->nullable()->references('id')->on('especializacions')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('especialistas');
    }
};
