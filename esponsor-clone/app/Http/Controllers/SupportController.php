<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CreatorProfile;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Guardar un nuevo apoyo para un creador
     * 
     * @param Request $request
     * @param string $slug - El slug del creador
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $slug)
    {
        // Buscar el perfil del creador por su slug
        $profile = CreatorProfile::where('slug', $slug)->firstOrFail();

        // Validar los datos del formulario
        $validated = $request->validate([
            'supporter_name' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'amount' => 'required|numeric|min:1|max:100',
        ], [
            'supporter_name.required' => 'Por favor ingresa tu nombre',
            'message.required' => 'Por favor deja un mensaje',
            'amount.min' => 'El monto mínimo es 1',
            'amount.max' => 'El monto máximo es 100',
        ]);

        // Crear el apoyo
        $support = new Support($validated);
        $support->creator_profile_id = $profile->id;
        $support->save();

        // Redirigir con mensaje de éxito
        return back()->with('success', '¡Gracias por tu apoyo! 💖');
    }
}
