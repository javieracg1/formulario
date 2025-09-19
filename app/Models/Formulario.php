<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Formulario extends Model
{
    protected $fillable = [
        'unidad_solicitante',
        'nombre_evento',
        'fecha_evento',
        'hora_desde',
        'hora_hasta',
        'objetivo_evento',
        'tipo_evento',
        'tipo_evento_otro',
        'ambiente',
        'descripcion_lugar',
        'servicio_catering_nuevo',
        'servicio_catering_otro',
        'comunicacion_1',
        'comunicacion_2',
        'comunicacion_3',
        'comunicacion_4',
        'tecnologia_1',
        'tecnologia_2',
        'tecnologia_3',
        'tecnologia_4',
        'institucion_responsable',
        'nombre_responsable',
        'cargo_responsable',
        'telefono_responsable',
        'email_responsable',
        'elaborado_nombre',
        'aprobado_nombre',
        'autorizado_nombre',
        'fechaRegistro',
        'atendido',
        'institucion_responsable_1',
        'cantidad_participantes_1',
        'grado_participantes_1',
        'notas_adicionales'
    ];

    protected $casts = [
        'fecha_evento' => 'date',
        'hora_desde' => 'datetime:H:i',
        'hora_hasta' => 'datetime:H:i',
        'fechaRegistro' => 'datetime',
        'atendido' => 'boolean',
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

    // Mutadores para convertir campos de texto a mayúsculas
    public function setUnidadSolicitanteAttribute($value)
    {
        $this->attributes['unidad_solicitante'] = $value ? strtoupper($value) : null;
    }

    public function setNombreEventoAttribute($value)
    {
        $this->attributes['nombre_evento'] = $value ? strtoupper($value) : null;
    }

    public function setObjetivoEventoAttribute($value)
    {
        $this->attributes['objetivo_evento'] = $value ? strtoupper($value) : null;
    }

    public function setTipoEventoAttribute($value)
    {
        $this->attributes['tipo_evento'] = $value ? strtoupper($value) : null;
    }

    public function setTipoEventoOtroAttribute($value)
    {
        $this->attributes['tipo_evento_otro'] = $value ? strtoupper($value) : null;
    }

    public function setAmbienteAttribute($value)
    {
        $this->attributes['ambiente'] = $value ? strtoupper($value) : null;
    }

    public function setDescripcionLugarAttribute($value)
    {
        $this->attributes['descripcion_lugar'] = $value ? strtoupper($value) : null;
    }

    public function setServicioCateringNuevoAttribute($value)
    {
        $this->attributes['servicio_catering_nuevo'] = $value ? strtoupper($value) : null;
    }

    public function setServicioCateringOtroAttribute($value)
    {
        $this->attributes['servicio_catering_otro'] = $value ? strtoupper($value) : null;
    }

    public function setComunicacion1Attribute($value)
    {
        $this->attributes['comunicacion_1'] = $value ? strtoupper($value) : null;
    }

    public function setComunicacion2Attribute($value)
    {
        $this->attributes['comunicacion_2'] = $value ? strtoupper($value) : null;
    }

    public function setComunicacion3Attribute($value)
    {
        $this->attributes['comunicacion_3'] = $value ? strtoupper($value) : null;
    }

    public function setComunicacion4Attribute($value)
    {
        $this->attributes['comunicacion_4'] = $value ? strtoupper($value) : null;
    }

    public function setTecnologia1Attribute($value)
    {
        $this->attributes['tecnologia_1'] = $value ? strtoupper($value) : null;
    }

    public function setTecnologia2Attribute($value)
    {
        $this->attributes['tecnologia_2'] = $value ? strtoupper($value) : null;
    }

    public function setTecnologia3Attribute($value)
    {
        $this->attributes['tecnologia_3'] = $value ? strtoupper($value) : null;
    }

    public function setTecnologia4Attribute($value)
    {
        $this->attributes['tecnologia_4'] = $value ? strtoupper($value) : null;
    }

    public function setInstitucionResponsableAttribute($value)
    {
        $this->attributes['institucion_responsable'] = $value ? strtoupper($value) : null;
    }

    public function setNombreResponsableAttribute($value)
    {
        $this->attributes['nombre_responsable'] = $value ? strtoupper($value) : null;
    }

    public function setCargoResponsableAttribute($value)
    {
        $this->attributes['cargo_responsable'] = $value ? strtoupper($value) : null;
    }

    public function setElaboradoNombreAttribute($value)
    {
        $this->attributes['elaborado_nombre'] = $value ? strtoupper($value) : null;
    }

    public function setAprobadoNombreAttribute($value)
    {
        $this->attributes['aprobado_nombre'] = $value ? strtoupper($value) : null;
    }

    public function setAutorizadoNombreAttribute($value)
    {
        $this->attributes['autorizado_nombre'] = $value ? strtoupper($value) : null;
    }

    public function setInstitucionResponsable1Attribute($value)
    {
        $this->attributes['institucion_responsable_1'] = $value ? strtoupper($value) : null;
    }

    public function setGradoParticipantes1Attribute($value)
    {
        $this->attributes['grado_participantes_1'] = $value ? strtoupper($value) : null;
    }
}
