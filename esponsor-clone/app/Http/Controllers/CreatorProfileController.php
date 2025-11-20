<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CreatorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CreatorProfileController extends Controller
{
    /**
     * Actualizar el perfil del creador
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'display_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|alpha_dash|unique:creator_profiles,slug,' . auth()->user()->creatorProfile?->id,
            'bio' => 'nullable|string|max:500',
            'avatar_url' => 'nullable|url|max:500',
        ], [
            'slug.alpha_dash' => 'El slug solo puede contener letras, números, guiones y guiones bajos',
            'slug.unique' => 'Este slug ya está en uso',
            'avatar_url.url' => 'Debe ser una URL válida',
        ]);

        // Obtener o crear el perfil del usuario autenticado
        $profile = auth()->user()->creatorProfile ?? new CreatorProfile();
        
        // Si es un perfil nuevo, asignar el user_id
        if (!$profile->exists) {
            $profile->user_id = auth()->id();
        }

        // Asignar los valores validados
        $profile->fill($validated);
        
        // Guardar en la base de datos
        $profile->save();

        // Redirigir con mensaje de éxito
        return back()->with('success', '¡Perfil actualizado exitosamente!');
    }
}
