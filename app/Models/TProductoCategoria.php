<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TProductoCategoria extends Model
{
    use HasFactory;
    protected $table = "producto_categoria";

    public function producto()
    {
        return $this->belongsTo(TProducto::class, 'id_producto');
    }

    public function categoria()
    {
        return $this->belongsTo(TCategoria::class, 'id_categoria');
    }
}
