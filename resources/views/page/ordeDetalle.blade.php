@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h2 class="mt-30 page-title">Orden</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('index_orden')}}">Orders</a></li>
        <li class="breadcrumb-item active">Ver Orden</li>
    </ol>
    <div class="row">
        <div class="col-lg-12 col-md-6">
            <div class="card card-static-2 mb-30">
                <div class="card-title-1 row">
                    <div class="col-lg-9 my-auto">
                        <h4 class=" text-secondary ">ORDEN N°{{$orden->id}}</h4>
                    </div>
                    <div class="col-lg-3 my-auto">
                        <div class="select-status flex justify-between ">
                            <div><label for="status">Estado: </label></div>
                            <div class="status-active uppercase">
                                    {{$orden->estado}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body-table">
                    <div class="news-content-right pd-20 mx-5">
                        <div class="row">
                            <div class=" col-lg-3 my-auto">
                                <p class=" font-semibold text-sm">Nombre:</p>
                            </div>
                            <div class=" col-lg-7  my-auto">
                                <p class=" pl-2">{{$orden->cliente->nombre}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-lg-3  my-auto">
                                <p class=" font-semibold text-sm">Email:</p>
                            </div>
                            <div class=" col-lg-7  my-auto">
                                <p class=" pl-2">{{$orden->cliente->email}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-lg-3  my-auto">
                                <p class=" font-semibold text-sm">Celular:</p>
                            </div>
                            <div class=" col-lg-7  my-auto">
                                <p class=" pl-2">{{$orden->cliente->celular}}</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class=" col-lg-3  my-auto">
                                <p class=" font-semibold text-sm">Direccion de entrega:</p>
                            </div>
                            <div class=" col-lg-7  my-auto">
                                <p class=" pl-2">{{$orden->direccion_envio}}</p>
                            </div>
                        </div>
                        <div class="row my-5">
                            <div class="col-12 card-body-table">
                                <div class="table-responsive">
                                    <table class="table ucp-table table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width:60px">#</th>
                                                <th>Producto</th>
                                                <th class=" text-right">Precio</th>
                                                <th class=" text-right">Cantidad</th>
                                                <th class=" text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orden->orden_detalle as $item)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>
                                                   {{ $item->producto->nombre}}
                                                </td>
                                                <td class=" text-right">
                                                    {{$item->precio}}
                                                </td>
                                                <td class=" text-right">{{$item->cantidad}}</td>                                   
                                                <td class=" text-right">
                                                    {{$item->total}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7"></div>
                            <div class="col-lg-5">
                                <div class="order-total-dt">
                                    <div class="order-total-left-text fsz-18">
                                        Total
                                    </div>
                                    <div class="order-total-right-text fsz-18">
                                        S/. {{$orden->monto}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection