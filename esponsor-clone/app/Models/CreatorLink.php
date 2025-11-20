<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CreatorLink extends Model
{
    /**
     * Campos que se pueden asignar masivamente
     *
     * @var array<string>
     */
    protected $fillable = [
        'creator_profile_id',
        'title',
        'url',
        'order',
    ];

    /**
     * Relación: Un link pertenece a un perfil de creador
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creatorProfile(): BelongsTo
    {
        return $this->belongsTo(CreatorProfile::class);
    }
}
