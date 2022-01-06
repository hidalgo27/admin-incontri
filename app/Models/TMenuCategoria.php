<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TMenuCategoria extends Model
{
    use HasFactory;
    protected $table = "menu_categoria";

    public function menu(){
        return $this->hasMany(TMenu::class,'id_categoria');
    }
}
