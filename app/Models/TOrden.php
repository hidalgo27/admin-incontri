<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TOrden extends Model
{
    use HasFactory;
    protected $table = "orden";

    public function cliente(){
        return $this->belongsTo(TCliente::class , 'id_cliente');
    }
    public function orden_detalle(){
        return $this->hasMany(TOrdenDetalle::class,'id_orden');
    }
}
