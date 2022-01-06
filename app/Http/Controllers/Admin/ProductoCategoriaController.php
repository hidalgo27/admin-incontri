<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TCategoria;

class ProductoCategoriaController extends Controller
{
    //
    public function index()
    {
        $categorias=TCategoria::paginate(10);
        return view('page.categoria', compact('categorias'));
    }
    public function store(Request $request)
    {  
        if ($request->filled(['nombre', 'nombre_ingles'])){
            $categoria = new TCategoria();
            $categoria->nombre = $request->input('nombre');
            $categoria->nombre_ingles = $request->input('nombre_ingles');
            $categoria->save();
            return redirect(route('index_categoria'))->with('status', 'Categoria creada exitosamente');
        }else{
            return "false";
        }
    }
    public function update(Request $request, $id)
    {
        if ($request->filled(['nombre', 'nombre_ingles'])){
            $categoria = TCategoria::FindOrFail($id);
            $categoria->nombre = $request->input('nombre');
            $categoria->nombre_ingles = $request->input('nombre_ingles');
            $categoria->save();
            return redirect(route('index_categoria'))->with('update', 'Categoria actualizada exitosamente');

        }else{
            return "false";
        }
    }
    public function destroy($id)
    {
        $categoria=TCategoria::find($id);
        $categoria->delete();
        return redirect(route('index_categoria'))->with('delete', 'Categoria eliminada exitosamente');
    }
}
