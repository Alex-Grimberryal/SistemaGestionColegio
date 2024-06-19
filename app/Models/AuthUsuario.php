<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class AuthUsuario extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $table = 'usuarios';

    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'contrasena', 'rol'];
}
