@extends('layouts.app')
@section('content')
<div class="container-fluid">
        <h2 class="mt-30 page-title">Categorias</h2>
        <ol class="breadcrumb mb-30">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Categorias</li>
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
                <a href="#addCategory" data-toggle="modal" class="add-btn hover-btn">Agregar nuevo</a>
            </div>
            <div class="col-lg-10 col-md-8 mx-auto">
                <div class="card card-static-2 mt-30 mb-30">
                    <div class="card-body-table">
                        <div class="table-responsive">
                            <table class="table ucp-table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width:60px">ID</th>
                                        <th>Nombre</th>
                                        <th>Nombre Ingles</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categorias as $categoria)
                                    <tr>
                                        <td>{{$categoria->id}}</td>
                                        <td>{{$categoria->nombre}}</td>
                                        <td>{{$categoria->nombre_ingles}}</td>
                                        <td class="action-btns">
                                            <a href="#editCategory_{{$categoria->id}}" data-toggle="modal"  class="edit-btn  mx-2 text-small" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="#delete_category_{{$categoria->id}}" data-toggle="modal" class="edit-btn mx-2 text-small" title="Edit"><i class="fas fa-trash"></i> Delete</a>
                                        </td>
                                        <div id="editCategory_{{$categoria->id}}" class="modal fade">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title font-semibold uppercase">Editar categoria producto</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <form action="{{route('update_categoria',$categoria->id)}}" method="post">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class=" col-lg-12">
                                                                            <div class="row">
                                                                                <div class=" col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">Nombre*</label>
                                                                                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{$categoria->nombre}}"required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">Nombre Ingles*</label>
                                                                                        <input type="text" class="form-control" name="nombre_ingles" placeholder="Nombre en ingles" value="{{$categoria->nombre_ingles}}" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="my-5 text-center">
                                                                                <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                                                                                <input type="submit" class="btn btn-success" value="Actualizar">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div id="delete_category_{{$categoria->id}}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route('destroy_categoria', $categoria->id)}}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Eliminar categoria</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Esta seguro que quiere eliminar esta categoria?</p>
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
                    {{$categorias->links()}}
                </div>
            </div>
        </div>
    </div>
    <div id="addCategory" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-semibold uppercase">Agregar categoria producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('store_categoria')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class=" col-lg-12">
                                        <div class="row">
                                            <div class=" col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Nombre*</label>
                                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                                                </div>
                                            </div>
                                            <div class=" col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Nombre Ingles*</label>
                                                    <input type="text" class="form-control" name="nombre_ingles" placeholder="Nombre en ingles" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-5 text-center">
                                            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                                            <input type="submit" class="btn btn-success" value="Agregar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
@endsection