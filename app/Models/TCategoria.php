<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCategoria extends Model
{
    use HasFactory;
    protected $table = "categoria";

    public function producto_categoria()
    {
        return $this->hasMany(TProductoCategoria::class, 'id_categoria');
    }
}
