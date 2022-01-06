@extends('layouts.app')
@section('content')
<div class="container-fluid">
        <h2 class="mt-30 page-title">Menus</h2>
        <ol class="breadcrumb mb-30">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Menus</li>
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
                <a href="#addMenu" data-toggle="modal" class="add-btn hover-btn">Agregar nuevo</a>
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
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
                                    <tr>
                                        <td>{{$menu->id}}</td>
                                        <td>{{$menu->nombre}}</td>
                                        <td class="action-btns">
                                            <a href="#editMenu_{{$menu->id}}" class="edit-btn  mx-2 text-small" data-toggle="modal" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="#delete_menu_{{$menu->id}}" class="edit-btn mx-2 text-small" data-toggle="modal" title="Delete"><i class="fas fa-trash"></i> Delete</a>
                                        </td>
                                        <div id="editMenu_{{$menu->id}}" class="modal fade">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title font-semibold uppercase">Editar menu</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <form action="{{route('update_menu',$menu->id)}}" method="post">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class=" col-lg-12 mx-auto">
                                                                            <div class="row">
                                                                                <div class=" col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">Nombre*</label>
                                                                                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{$menu->nombre}}" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">Nombre Ingles*</label>
                                                                                        <input type="text" class="form-control" name="nombre_ingles" placeholder="Nombre" value="{{$menu->nombre_ingles}}" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group my-4">
                                                                                <label class="form-label">Categoria*</label>
                                                                                <select id="categtory" name="categoria" class="form-control" required>
                                                                                    <option selected value="{{$categorias->where('id',$menu->id_categoria)->first()->id}}" hidden>{{$categorias->where('id',$menu->id_categoria)->first()->nombre}}</option>
                                                                                    @foreach ($categorias as $categoria)
                                                                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class=" col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">Descripcion</label>
                                                                                        <textarea class="form-control" name="descripcion" placeholder="descripcion" rows="4">{{$menu->descripcion}}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">Descripcion Ingles</label>
                                                                                        <textarea class="form-control" name="descripcion_ingles" placeholder="descripcion en ingles" rows="4">{{$menu->descripcion_ingles}}</textarea>
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
                                        <div id="delete_menu_{{$menu->id}}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route('destroy_menu', $menu->id)}}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Eliminar menu</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Esta seguro que quiere eliminar este menu?</p>
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
                    {{$menus->links()}}
                </div>
            </div>
        </div>
    </div>
    <div id="addMenu" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-semibold uppercase">Agregar menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('store_menu')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class=" col-lg-12 mx-auto">
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
                                                    <input type="text" class="form-control" name="nombre_ingles" placeholder="Nombre" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group my-4">
                                            <label class="form-label">Categoria*</label>
                                            <select id="categtory" name="categoria" class="form-control" required>
                                                <option selected hidden>--Select Category--</option>
                                                @foreach ($categorias as $categoria)
                                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class=" col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Descripcion</label>
                                                    <textarea class="form-control" name="descripcion" placeholder="descripcion" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class=" col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Descripcion Ingles</label>
                                                    <textarea class="form-control" name="descripcion_ingles" placeholder="descripcion en ingles" rows="4"></textarea>
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