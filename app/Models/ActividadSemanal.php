<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ActividadSemanal extends Model
{
    protected $table = 'actividades_semanales';

    protected $fillable = [
        'realiza_actividad',
        'nombre_gerencia'
    ];

    protected $casts = [
        'realiza_actividad' => 'boolean',
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
