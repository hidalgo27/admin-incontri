@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h2 class="mt-30 page-title">Productos</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('index_producto')}}">Productos</a></li>
        <li class="breadcrumb-item active">Agregar Producto</li>
    </ol>
    <div class="row">
        <div class="col-lg-12 col-md-6">
            <div class="card card-static-2 mb-30">
                <div class="card-title-2">
                    <h4>Agregar nuevo producto</h4>
                </div>
                <div class="card-body-table">
                    <div class="news-content-right pd-20">
                        <form action="{{route('store_producto')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <div class=" col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Nombre*</label>
                                        <input type="text" class="form-control" placeholder="Nombre del producto" name="nombre" required>
                                    </div>
                                </div>
                                <div class=" col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Nombre Ingles*</label>
                                        <input type="text" class="form-control" placeholder="Nombre del producto" name="nombre_ingles" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Categoria*</label>
                                        <select id="choices-multiple-remove-button" placeholder="Selecione categoria" name="categoria[]" multiple required>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class=" col-lg-6">
                                    <div class=" col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Url*</label>
                                            <input type="text" class="form-control" placeholder="URL" name="url" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class=" row">
                                <div class=" col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Descripcion</label>
                                        <textarea type="text" class="form-control" rows="4" name="descripcion" placeholder="descripcion"></textarea>
                                    </div>
                                </div>
                                <div class=" col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Descripcion Ingles</label>
                                        <textarea type="text" class="form-control" rows="4" name="descripcion_ingles" placeholder="descripcion en ingles"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class=" col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Precio*</label>
                                        <input type="text" class="form-control" placeholder="24.70" name="precio" required>
                                    </div>
                                </div>
                                <div class=" col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Stock*</label>
                                        <input type="number" class="form-control" placeholder="0" name="stock" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">Imagen del producto*</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile04" name="producto_imagen" onchange="readURL(this)">
                                                <label class="custom-file-label" id="file_image" for="inputGroupFile04">Elegir imagen</label>
                                            </div>
                                        </div>
                                        <div class="add-cate-img-1">
                                            <img class="imageid" src="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">Descuento</label>
                                        <input type="number" class="form-control" placeholder="0" name="descuento">
                                    </div>
                                </div>
                            </div>
                            <button class="save-btn hover-btn mt-10" type="submit">Agregar Producto</button>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection