<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Mostrar el dashboard del creador
     * 
     * @return \Inertia\Response
     */
    public function index()
    {
        $user = auth()->user();
        $profile = $user->creatorProfile;

        // Datos del perfil (o valores por defecto si no existe)
        $profileData = $profile ? [
            'id' => $profile->id,
            'slug' => $profile->slug,
            'display_name' => $profile->display_name,
            'bio' => $profile->bio,
            'avatar_url' => $profile->avatar_url,
            'public_url' => route('creator.public', $profile->slug),
        ] : null;

        // Links del creador
        $links = $profile ? $profile->links : [];

        // Apoyos recibidos
        $supports = $profile ? $profile->supports()->paginate(10) : [];

        // Estadísticas
        $stats = $profile ? [
            'total_supports' => $profile->supports()->count(),
            'total_amount' => $profile->supports()->sum('amount'),
            'total_links' => $profile->links()->count(),
        ] : [
            'total_supports' => 0,
            'total_amount' => 0,
            'total_links' => 0,
        ];

        return Inertia::render('Dashboard', [
            'profile' => $profileData,
            'links' => $links,
            'supports' => $supports,
            'stats' => $stats,
        ]);
    }
}
