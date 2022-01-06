<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TMenu extends Model
{
    use HasFactory;
    protected $table = "menu";

    public function menu_categoria(){
        return $this->belongsTo(TMenuCategoria::class , 'id_ctegoria');
    }
}
