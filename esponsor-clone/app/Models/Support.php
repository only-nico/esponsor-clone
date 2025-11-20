<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Support extends Model
{
    /**
     * Indicar que esta tabla solo usa created_at (no updated_at)
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * Campos que se pueden asignar masivamente
     *
     * @var array<string>
     */
    protected $fillable = [
        'creator_profile_id',
        'supporter_name',
        'message',
        'amount',
    ];

    /**
     * Cast de atributos
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount' => 'decimal:2',
        'created_at' => 'datetime',
    ];

    /**
     * Relación: Un apoyo pertenece a un perfil de creador
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creatorProfile(): BelongsTo
    {
        return $this->belongsTo(CreatorProfile::class);
    }
}
