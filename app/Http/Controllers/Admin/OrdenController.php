<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TOrden;

class OrdenController extends Controller
{
    //
    public function home()
    {
        $title="Pendiente";
        $ordenes=TOrden::where('estado','pendiente')->orderby('created_at','DESC')->paginate(5);
        return view('page.orden', compact('ordenes','title'));
    }
    public function index()
    {
        $title="";
        $ordenes=TOrden::orderby('created_at','DESC')->paginate(10);
        return view('page.orden', compact('ordenes','title'));
    }
    public function orden_Detalle($id)
    {
        $orden=TOrden::find($id);
        return view('page.ordeDetalle', compact('orden'));
    }
    public function update_estado(Request $request, $id)
    {
        $orden = TOrden::FindOrFail($id);
        $orden->estado = $request->input('categoria');
        $orden->save();
        return redirect(route('index_orden'))->with('update', 'Estado actualizado exitosamente');
    }
}
