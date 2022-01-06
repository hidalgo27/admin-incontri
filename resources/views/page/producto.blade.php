@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h2 class="mt-30 page-title">Productos</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Productos</li>
    </ol>
    @if (session('status'))
        <div class="alert alert-success my-2" role="alert">
            {{session('status')}}
        </div>
    @endif
    @if (session('update'))
        <div class="alert alert-success my-2" role="alert">
            {{session('update')}}
        </div>
    @endif
    @if (session('delete'))
        <div class="alert alert-danger my-2" role="alert">
            {{session('delete')}}
        </div>
    @endif
    <div class="row justify-content-between">
        <div class="col-lg-12">
            <a href="add_product.html" class="add-btn hover-btn">Agregar nuevo</a>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card card-static-2 mt-30 mb-30">
                <div class="card-body-table">
                    <div class="table-responsive">
                        <table class="table ucp-table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:60px">ID</th>
                                    <th style="width:100px">Imagen</th>
                                    <th>Nombre</th>
                                    <th>Categorias</th>
                                    <th>Stock</th>
                                    <th>Precio</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                    <td>{{$producto->id}}</td>
                                    <td>
                                        <div class="cate-img-5">
                                            <img src="{{asset($producto->imagen)}}">
                                        </div>
                                    </td>
                                    <td>{{$producto->nombre}}</td>
                                    @php
                                        $cat="";
                                        foreach ($producto->producto_categoria as $categoria){
                                            $cat.=" - ".$categoria->categoria->nombre;
                                        }
                                    @endphp                                     
                                    <td>
                                        {{$cat}}
                                    </td>
                                    <td>{{$producto->stock}}</td>
                                    <td>{{$producto->precio}}</td>
                                    <td class="action-btns">
                                        <a href="{{route('edit_producto',$producto->id)}}" class="edit-btn mx-2" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="#delete_producto_{{$producto->id}}" data-toggle="modal" class="edit-btn mx-2 text-small" title="Delete"><i class="fas fa-trash"></i> Delete</a>
                                    </td>
                                    <div id="delete_producto_{{$producto->id}}" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{route('destroy_producto', $producto->id)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Eliminar producto</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Esta seguro que quiere eliminar este producto?</p>
                                                        <p class="text-warning"><small>Esta accion no puede ser desecha.</small></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                        <input type="submit" class="btn btn-danger" value="Delete">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class=" d-flex my-4">
                {{$productos->links()}}
            </div>
        </div>
    </div>
</div>

@endsection