<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Resto de propiedades y métodos de la clase

    public function ambiente()
    {
        return $this->belongsTo(Ambiente::class, 'ambientes_idambiente', 'idambiente');
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesores_idprofesor', 'idprofesor');
    }
}
