<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CreatorLink;
use Illuminate\Http\Request;

class CreatorLinkController extends Controller
{
    /**
     * Crear un nuevo link
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validar datos
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:500',
            'order' => 'nullable|integer|min:0',
        ], [
            'url.url' => 'Debe ser una URL válida (incluye http:// o https://)',
        ]);

        // Verificar que el usuario tenga un perfil de creador
        $profile = auth()->user()->creatorProfile;
        
        if (!$profile) {
            return back()->with('error', 'Primero debes crear tu perfil de creador');
        }

        // Crear el link
        $link = new CreatorLink($validated);
        $link->creator_profile_id = $profile->id;
        
        // Si no se especificó orden, usar el siguiente disponible
        if (!isset($validated['order'])) {
            $link->order = $profile->links()->max('order') + 1;
        }
        
        $link->save();

        return back()->with('success', '¡Link agregado exitosamente!');
    }

    /**
     * Actualizar un link existente
     * 
     * @param Request $request
     * @param CreatorLink $link
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, CreatorLink $link)
    {
        // Verificar que el link pertenece al usuario autenticado
        if ($link->creatorProfile->user_id !== auth()->id()) {
            abort(403, 'No autorizado');
        }

        // Validar datos
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:500',
            'order' => 'nullable|integer|min:0',
        ]);

        // Actualizar
        $link->update($validated);

        return back()->with('success', '¡Link actualizado exitosamente!');
    }

    /**
     * Eliminar un link
     * 
     * @param CreatorLink $link
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CreatorLink $link)
    {
        // Verificar que el link pertenece al usuario autenticado
        if ($link->creatorProfile->user_id !== auth()->id()) {
            abort(403, 'No autorizado');
        }

        // Eliminar
        $link->delete();

        return back()->with('success', '¡Link eliminado exitosamente!');
    }

    /**
     * Reordenar links
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reorder(Request $request)
    {
        $validated = $request->validate([
            'links' => 'required|array',
            'links.*.id' => 'required|exists:creator_links,id',
            'links.*.order' => 'required|integer|min:0',
        ]);

        $profile = auth()->user()->creatorProfile;
        
        if (!$profile) {
            return back()->with('error', 'No tienes un perfil de creador');
        }

        // Actualizar el orden de cada link
        foreach ($validated['links'] as $linkData) {
            $link = CreatorLink::find($linkData['id']);
            
            // Verificar que el link pertenece al usuario
            if ($link && $link->creator_profile_id === $profile->id) {
                $link->order = $linkData['order'];
                $link->save();
            }
        }

        return back()->with('success', 'Orden actualizado');
    }
}
