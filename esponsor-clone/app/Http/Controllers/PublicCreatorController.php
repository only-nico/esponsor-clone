<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CreatorProfile;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublicCreatorController extends Controller
{
    /**
     * Mostrar la página pública de un creador
     * 
     * @param string $slug - El slug del creador (@username)
     * @return \Inertia\Response
     */
    public function show($slug)
    {
        // Buscar el perfil del creador con sus relaciones
        $profile = CreatorProfile::with(['links', 'user'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Obtener los últimos apoyos recibidos (opcional, para mostrar en la página)
        $recentSupports = $profile->supports()
            ->latest()
            ->take(5)
            ->get();

        // Retornar la vista de Inertia con los datos
        return Inertia::render('Public/Creator', [
            'creator' => [
                'display_name' => $profile->display_name,
                'slug' => $profile->slug,
                'bio' => $profile->bio,
                'avatar_url' => $profile->avatar_url,
                'links' => $profile->links,
            ],
            'recentSupports' => $recentSupports,
        ]);
    }
}
