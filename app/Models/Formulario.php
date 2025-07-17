<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Formulario extends Model
{
    protected $fillable = [
        'gerencia',
        'fecha_actividad',
        'hora_actividad',
        'estado',
        'municipio',
        'parroquia',
        'lugar',
        'institucion_entes',
        'responsable',
        'tematica',
        'cantidad_personas',
        'requiere_cobertura',
        'requiere_protocolar',
        'apoyo_logistico',
        'otro_elemento',
        'atendido'
    ];

    protected $casts = [
        'fecha_actividad' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = Carbon::now('America/Caracas');
            $model->updated_at = Carbon::now('America/Caracas');
        });

        static::updating(function ($model) {
            $model->updated_at = Carbon::now('America/Caracas');
        });
    }
}
