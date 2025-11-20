<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CreatorProfile extends Model
{
    /**
     * Campos que se pueden asignar masivamente
     * (Mass assignment protection)
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'slug',
        'display_name',
        'bio',
        'avatar_url',
    ];

    /**
     * Relación: Un perfil de creador pertenece a un usuario
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación: Un perfil de creador tiene muchos links
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function links(): HasMany
    {
        return $this->hasMany(CreatorLink::class)->orderBy('order');
    }

    /**
     * Relación: Un perfil de creador ha recibido muchos apoyos
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function supports(): HasMany
    {
        return $this->hasMany(Support::class)->orderBy('created_at', 'desc');
    }

    /**
     * Obtener la URL pública del creador
     * 
     * @return string
     */
    public function getPublicUrlAttribute(): string
    {
        return route('creator.public', $this->slug);
    }
}
