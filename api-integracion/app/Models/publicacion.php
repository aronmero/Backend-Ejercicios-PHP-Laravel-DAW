<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publicacion extends Model
{
    use HasFactory;
    protected $table = 'publicaciones';
    public $timestamps = false;

    protected static function booted()
    {
        static::deleting(function ($publicacion) {
            $publicacion->etiquetas()->detach();
            $publicacion->comercios()->detach();
        });
    }

    /**
     * Define la relación muchos a muchos con etiquetas.
     */
    public function etiquetas()
    {
        return $this->belongsToMany(Etiqueta::class, 'etiqueta_publicacion', 'publicacion_id', 'etiqueta_id')
            ->withTimestamps();
    }

    /**
     * Define la relación muchos a muchos con comercios.
     */
    public function comercios()
    {
        return $this->belongsToMany(Comercio::class, 'comercio_publicacion', 'publicacion_id', 'usuario_id')
            ->withTimestamps();
    }

    /**
     * Define la relación de pertenencia a un tipo de publicación.
     */
    public function tipo()
    {
        return $this->belongsTo(Tipo_Publicacion::class, 'tipo_id');
    }
}
