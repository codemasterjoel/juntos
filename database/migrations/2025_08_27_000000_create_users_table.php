<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Traits\HasRoles;

class CreateUsersTable extends Migration
{
    use HasFactory, HasRoles;
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('telefono')->nullable();
            $table->foreignId('estado_id')->nullable()->references('id')->on('estados')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('municipio_id')->nullable()->references('id')->on('municipios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('parroquia_id')->nullable()->references('id')->on('parroquias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('comuna_id')->nullable()->references('id')->on('comunas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('consejo_comunal_id')->nullable()->references('id')->on('consejo_comunals')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('is_active')->default(true);
            $table->string('especializacion')->nullable();
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
