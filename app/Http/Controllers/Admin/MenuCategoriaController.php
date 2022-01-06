<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\TMenuCategoria;

class MenuCategoriaController extends Controller
{
    //
    public function index()
    {
        $menusCategorias=TMenuCategoria::paginate(10);
        return view('page.menuCategoria', compact('menusCategorias'));
    }
    public function store(Request $request)
    {  
        if ($request->filled(['nombre', 'nombre_ingles'])){
            $categoria = new TMenuCategoria();
            $categoria->nombre = $request->input('nombre');
            $categoria->nombre_ingles = $request->input('nombre_ingles');
            if( $request->hasFile('imagen_categoria')){
                $file=$request->file('imagen_categoria');
                $destinationPath="images/featured";
                $filename=time()."-".$file->getClientOriginalName();
                $uploadSuccess=$request->file('imagen_categoria')->move($destinationPath,$filename);
                $categoria->imagen=$destinationPath."/".$filename;
            }
            $categoria->save();
            return redirect(route('index_menu_categoria'))->with('status', 'Categoria creada exitosamente');
        }else{
            return "false";
        }
    }
    public function update(Request $request, $id)
    {
        if ($request->filled(['nombre', 'nombre_ingles'])){
            $categoria = TMenuCategoria::FindOrFail($id);
            $categoria->nombre = $request->input('nombre');
            $categoria->nombre_ingles = $request->input('nombre_ingles');
            if( $request->hasFile('imagen_categoria')){
                File::delete($categoria->imagen);
                $file=$request->file('imagen_categoria');
                $destinationPath="images/featured";
                $filename=time()."-".$file->getClientOriginalName();
                $uploadSuccess=$request->file('imagen_categoria')->move($destinationPath,$filename);
                $categoria->imagen=$destinationPath."/".$filename;
            }
            $categoria->save();
            return redirect(route('index_menu_categoria'))->with('update', 'Categoria actualizada exitosamente');

        }else{
            return "false";
        }
    }
    public function destroy($id)
    {
        $categoria=TMenuCategoria::find($id);
        if($categoria->imagen){
            File::delete($categoria->imagen);
        }
        $categoria->delete();
        return redirect(route('index_menu_categoria'))->with('delete', 'Categoria eliminada exitosamente');
    }
}
