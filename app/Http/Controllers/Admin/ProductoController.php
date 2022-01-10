<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TProducto;
use App\Models\TCategoria;
use App\Models\TProductoCategoria;
use Illuminate\Support\Facades\File;
class ProductoController extends Controller
{
    //
    public function index()
    {
        $productos=TProducto::paginate(10);
        return view('page.producto', compact('productos'));
    }
    public function create()
    {
        $categorias=TCategoria::all();
        return view('page.productoCreate', compact('categorias'));
    }
    public function store(Request $request)
    {  
        if ($request->filled(['nombre', 'nombre_ingles','url'])){
            $producto = new TProducto();
            $producto->nombre = $request->input('nombre');
            $producto->nombre_ingles = $request->input('nombre_ingles');
            $producto->descripcion = $request->input('descripcion');
            $producto->descripcion_ingles = $request->input('descripcion_ingles');
            $producto->url = $request->input('url');
            $producto->precio = $request->input('precio');
            $producto->stock = $request->input('stock');
            $producto->descuento = $request->input('descuento');
            if( $request->hasFile('producto_imagen')){
                $file=$request->file('producto_imagen');
                $destinationPath="images/featured";
                $filename=time()."-".$file->getClientOriginalName();
                $uploadSuccess=$request->file('producto_imagen')->move($destinationPath,$filename);
                $producto->imagen=$destinationPath."/".$filename;
            }
            if($producto->save()){
                if($request->input('categoria')){
                    foreach ($request->input('categoria') as $categoria){
                        $productoCategoria=new TProductoCategoria();
                        $productoCategoria->id_producto=$producto->id;
                        $productoCategoria->id_categoria=$categoria;
                        $productoCategoria->save();
                    }
                }
            }
            return redirect(route('index_producto'))->with('status', 'Producto creado exitosamente');
        }else{
            return "false";
        }
    }
    public function edit($id)
    {
        $categorias=TCategoria::all();
        $producto = TProducto::where('id', $id)->first();
        return view('page.productoEdit', compact('producto','categorias'));
    }
    public function update(Request $request, $id)
    {
        if ($request->filled(['nombre', 'nombre_ingles','url'])){
            $producto = TProducto::FindOrFail($id);
            $producto->nombre = $request->input('nombre');
            $producto->nombre_ingles = $request->input('nombre_ingles');
            $producto->descripcion = $request->input('descripcion');
            $producto->descripcion_ingles = $request->input('descripcion_ingles');
            $producto->url = $request->input('url');
            $producto->precio = $request->input('precio');
            $producto->stock = $request->input('stock');
            $producto->descuento = $request->input('descuento');
            if( $request->hasFile('producto_imagen')){
                File::delete($producto->imagen);
                $file=$request->file('producto_imagen');
                $destinationPath="images/featured";
                $filename=time()."-".$file->getClientOriginalName();
                $uploadSuccess=$request->file('producto_imagen')->move($destinationPath,$filename);
                $producto->imagen=$destinationPath."/".$filename;
            }
            foreach ($producto->producto_categoria as $categoria){
                $categoria->delete();
            }      
            if($request->input('categoria')){
                foreach ($request->input('categoria') as $categoria){
                    $productoCategoria=new TProductoCategoria();
                    $productoCategoria->id_producto=$producto->id;
                    $productoCategoria->id_categoria=$categoria;
                    $productoCategoria->save();
                }
            }
            $producto->save();
            return redirect(route('index_producto'))->with('update', 'Producto actualizado exitosamente');

        }else{
            return "false";
        }
    }
    public function destroy($id)
    {
        $producto=TProducto::find($id);
        if($producto->imagen){
            File::delete($producto->imagen);
        }
        foreach ($producto->producto_categoria as $categoria){
            $categoria->delete();
        } 
        $producto->delete();
        return redirect(route('index_producto'))->with('delete', 'Producto eliminado exitosamente');
    }
}
