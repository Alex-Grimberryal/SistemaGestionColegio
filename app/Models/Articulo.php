<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'ambientes_idambiente',
        'categorias_idcategoria',
        'marcas_idmarca',
        'nroserie',
        'articulo',
        'fechaadq',
        'Stock_en_uso',
        'Stock_almacenado',
        'stock_dañado',
    ];

    public function ambiente()
    {
        return $this->belongsTo(Ambiente::class, 'ambientes_idambiente', 'idambiente');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categorias_idcategoria', 'idcategoria');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marcas_idmarca', 'idmarca');
    }
}
