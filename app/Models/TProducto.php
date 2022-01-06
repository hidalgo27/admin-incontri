<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TProducto extends Model
{
    use HasFactory;
    protected $table = "producto";

    public function producto_categoria()
    {
        return $this->hasMany(TProductoCategoria::class, 'id_producto');
    }
}
