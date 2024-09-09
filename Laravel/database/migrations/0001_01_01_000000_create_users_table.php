<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID del usuario
            $table->string('nombre'); // Nombre del usuario
            $table->string('apellidos'); // Apellidos del usuario
            $table->enum('rol', ['admin', 'user']); // Rol del usuario
            $table->enum('estatus', ['activo', 'inactivo']); // Estatus del usuario
            $table->string('correo')->unique(); // Correo del usuario
            $table->string('contraseña'); // Contraseña del usuario
            $table->timestamp('fecha_alta')->nullable(); // Fecha de alta
            $table->timestamp('fecha_baja')->nullable(); // Fecha de baja
            $table->timestamp('fecha_modificacion')->nullable(); //Fecha de modificacion
            $table->timestamps();
        });



        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
