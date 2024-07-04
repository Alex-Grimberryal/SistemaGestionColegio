<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesionesAbiertas extends Model
{
    use HasFactory;
    protected $table = 'sesiones_abiertas';
    protected $fillable = ['nombre_usuario','rol'];
}
