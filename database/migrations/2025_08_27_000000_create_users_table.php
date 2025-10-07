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
            
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('role')->default('paciente'); // 'admin', 'doctor', 'paciente'
            $table->rememberToken();
            $table->foreignId('paciente_id')->nullable()->references('id')->on('pacientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('especialista_id')->nullable()->references('id')->on('especialistas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
