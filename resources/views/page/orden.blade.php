@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h2 class="mt-30 page-title">Pedidos {{$title}}</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Pedidos</li>
    </ol>
    @if (session('update'))
        <div class="alert alert-success my-2" role="alert">
            {{session('update')}}
        </div>
    @endif
    <div class="row justify-content-between">
        <div class="col-lg-12 col-md-12">
            <div class="card card-static-2 mt-30 mb-30">
                <div class="card-body-table">
                    <div class="table-responsive">
                        <table class="table ucp-table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:60px">ID</th>
                                    <th>Porductos</th>
                                    <th>Cliente - celular</th>
                                    <th>Monto</th>
                                    <th>Dirrecion de envio</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordenes as $orden)
                                <tr>
                                    <td>{{$orden->id}}</td>
                                    <td>
                                        @foreach ($orden->orden_detalle as $item)
                                            <div>- {{$item->producto->nombre}}</div>
                                        @endforeach
                                    </td>
                                    <td>{{$orden->cliente->nombre}}<br>{{$orden->cliente->celular}}</td>                                  
                                    <td>
                                        {{$orden->monto}}
                                    </td>
                                    <td>{{$orden->direccion_envio}}</td>
                                    <td ><p class="uppercase text-xs">{{$orden->estado}}</p></td>
                                    <td class="action-btns">
                                        <a href="{{route('orden_Detalle',$orden->id)}}" class="edit-btn mx-2 text-small" title="View"><i class="fas fa-eye"></i> Ver</a>
                                        <a href="#edit_estado_{{$orden->id}}" data-toggle="modal" class="edit-btn mx-2" title="Edit"><i class="fas fa-edit"></i> Edit estado</a>
                                    </td>
                                    <div id="edit_estado_{{$orden->id}}" class="modal fade">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title font-semibold uppercase">Editar estado</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <form action="{{route('update_estado',$orden->id)}}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class=" col-lg-10 mx-auto">
                                                                        <div class="form-group my-4">
                                                                            <label class="form-label">Estado*</label>
                                                                            <select name="categoria" class="form-control" required>
                                                                                <option selected value="{{$orden->estado}}" hidden>{{$orden->estado}}</option>
                                                                                <option class="uppercase" value="pendiente">pendiente</option>
                                                                                <option class="uppercase" value="entredado" >entredado</option>
                                                                            </select>
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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class=" d-flex my-4">
                {{$ordenes->links()}}
            </div>
        </div>
    </div>
</div>

@endsection