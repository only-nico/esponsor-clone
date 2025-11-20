<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /**
     * Run the migrations.
     * Crea la tabla de apoyos (donaciones simbólicas) recibidos por los creadores.
     */
    public function up(): void
    {
        Schema::create('supports', function (Blueprint $table) {
            // ID autoincremental
            $table->id();
            
            // Relación con creator_profiles
            // Un creador puede recibir muchos apoyos
            // cascade: si se borra el perfil, se borran todos sus apoyos
            $table->foreignId('creator_profile_id')
                  ->constrained()
                  ->onDelete('cascade');
            
            // Nombre de quien apoya (no requiere cuenta de usuario)
            $table->string('supporter_name');
            
            // Mensaje de apoyo
            // text: permite mensajes largos
            $table->text('message');
            
            // Monto simbólico del apoyo
            // decimal(8, 2): 8 dígitos totales, 2 decimales
            // Ejemplo: 999999.99 es el máximo
            // unsigned(): solo valores positivos
            $table->decimal('amount', 8, 2)->unsigned();
            
            // Solo necesitamos created_at (cuándo se hizo el apoyo)
            // No necesitamos updated_at porque los apoyos no se editan
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
