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
     * Crea la tabla de perfiles de creadores.
     */
    public function up(): void
    {
        Schema::create('creator_profiles', function (Blueprint $table) {
            // ID autoincremental (clave primaria)
            $table->id();
            
            // Relación con la tabla users (1 user = 1 creator_profile)
            // foreignId: crea un campo unsignedBigInteger optimizado para foreign keys
            // constrained(): crea automáticamente la foreign key hacia 'users'
            // onDelete('cascade'): si se borra el user, se borra el perfil
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');
            
            // Slug único para la URL pública (ej: @john-doe)
            // unique(): garantiza que no haya dos creators con el mismo slug
            $table->string('slug')->unique();
            
            // Nombre público del creador (puede ser diferente al nombre del user)
            $table->string('display_name');
            
            // Biografía corta del creador
            // text: permite textos largos (más que string)
            // nullable(): este campo es opcional
            $table->text('bio')->nullable();
            
            // URL de la imagen de avatar
            // nullable(): el creador puede no tener avatar
            $table->string('avatar_url')->nullable();
            
            // Timestamps automáticos (created_at, updated_at)
            // Laravel los maneja automáticamente
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creator_profiles');
    }
};
