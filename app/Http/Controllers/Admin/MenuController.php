<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TMenu;
use App\Models\TMenuCategoria;

class MenuController extends Controller
{
    //
    public function index()
    {
        $menus=TMenu::paginate(10);
        $categorias=TMenuCategoria::all();
        return view('page.menu', compact('menus','categorias'));
    }
    public function store(Request $request)
    {  
        if ($request->filled(['nombre', 'nombre_ingles'])){
            $menu = new TMenu();
            $menu->nombre = $request->input('nombre');
            $menu->nombre_ingles = $request->input('nombre_ingles');
            $menu->descripcion = $request->input('descripcion');
            $menu->descripcion_ingles = $request->input('descripcion_ingles');
            $menu->id_categoria = $request->input('categoria');
            $menu->save();
            return redirect(route('index_menu'))->with('status', 'Menu creada exitosamente');
        }else{
            return "false";
        }
    }
    public function update(Request $request, $id)
    {
        if ($request->filled(['nombre', 'nombre_ingles'])){
            $menu = TMenu::FindOrFail($id);
            $menu->nombre = $request->input('nombre');
            $menu->nombre_ingles = $request->input('nombre_ingles');
            $menu->descripcion = $request->input('descripcion');
            $menu->descripcion_ingles = $request->input('descripcion_ingles');
            $menu->id_categoria = $request->input('categoria');
            $menu->save();
            return redirect(route('index_menu'))->with('update', 'Menu actualizada exitosamente');
        }else{
            return "false";
        }
    }
    public function destroy($id)
    {
        $menu=TMenu::find($id);
        $menu->id_categoria=null;
        $menu->delete();
        return redirect(route('index_menu'))->with('delete', 'Menu eliminada exitosamente');
    }
}
