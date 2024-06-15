<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    protected $primaryKey = 'idambiente';
    protected $fillable = ['ambiente', 'pabellon', 'piso', 'estado'];
}
