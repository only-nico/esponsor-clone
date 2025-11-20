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
     * Crea la tabla de links de los creadores (tipo Linktree).
     */
    public function up(): void
    {
        Schema::create('creator_links', function (Blueprint $table) {
            // ID autoincremental
            $table->id();
            
            // Relación con creator_profiles
            // Un creador puede tener muchos links
            // cascade: si se borra el perfil, se borran todos sus links
            $table->foreignId('creator_profile_id')
                  ->constrained()
                  ->onDelete('cascade');
            
            // Título del link (ej: "Mi Canal de YouTube", "Instagram")
            $table->string('title');
            
            // URL completa del link
            $table->string('url');
            
            // Orden de visualización (para mostrar los links en un orden específico)
            // integer: número entero
            // default(0): valor por defecto es 0
            $table->integer('order')->default(0);
            
            // Timestamps automáticos
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creator_links');
    }
};
