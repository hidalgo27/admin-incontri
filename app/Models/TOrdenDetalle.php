<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TOrdenDetalle extends Model
{
    use HasFactory;
    protected $table = "orden_Detalle";

    public function orden(){
        return $this->belongsTo(TOrden::class, 'id_orden');
    }
    public function producto(){
        return $this->belongsTo(TProducto::class, 'id_producto');
    }
}
