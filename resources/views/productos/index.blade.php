@extends('layouts.app')
@section('content')
    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrar-producto">
            Registrar producto
        </button>



        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                    <th>Proveedor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td>S/.{{ $producto->precio }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->existencias }}</td>
                        <td>{{ $producto->categoria }}</td>
                        <td>{{ $producto->proveedor }}</td>
                        <td>
                            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar-producto">
                                editar
                            </a>

                            <form action="{{ route('productos.destroy', $producto) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div class="modal fade" id="registrar-producto" tabindex="-1" aria-labelledby="registrar-producto-label"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="registrar-producto-label">Registrar producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/registrar-producto" method="post">
                                <div class="mb-3">
                                    <label for="nombre-producto" class="form-label">Nombre del producto</label>
                                    <input type="text" class="form-control" id="nombre-producto" name="nombre_producto">
                                </div>
                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input class="form-control" id="precio" name="precio">
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="existencias" class="form-label">Existencias</label>
                                    <input type="number" class="form-control" id="existencias" name="existencias">
                                </div>
                                <div class="mb-3">
                                    <label for="categoria" class="form-label">Categoría</label>
                                    <input type="text" class="form-control" id="categoria" name="categoria">
                                </div>
                                <div class="mb-3">
                                    <label for="proveedor" class="form-label">Proveedor</label>
                                    <input type="text" class="form-control" id="proveedor" name="proveedor">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>





        <form action="{{ route('productos.update', $producto) }}" method="POST">
            @csrf @method('PATCH')
            <div class="modal fade" id="editar-producto" tabindex="-1" aria-labelledby="registrar-producto-label"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="registrar-producto-label">Editar producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/registrar-producto" method="post">
                                <div class="mb-3">
                                    <label for="nombre-producto" class="form-label">Nombre del producto</label>
                                    <input type="text" class="form-control" id="nombre-producto"
                                        name="nombre_producto" value="{{ $producto->nombre_producto }}">
                                </div>
                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input class="form-control" id="precio" name="precio"
                                        value="{{ $producto->precio }}">
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <input class="form-control" id="descripcion" name="descripcion"
                                        value="{{ $producto->descripcion }}">
                                </div>
                                <div class="mb-3">
                                    <label for="existencias" class="form-label">Existencias</label>
                                    <input type="number" class="form-control" id="existencias" name="existencias"
                                        value="{{ $producto->existencias }}">
                                </div>
                                <div class="mb-3">
                                    <label for="categoria" class="form-label">Categoría</label>
                                    <input type="text" class="form-control" id="categoria" name="categoria"
                                        value="{{ $producto->categoria }}">
                                </div>
                                <div class="mb-3">
                                    <label for="proveedor" class="form-label">Proveedor</label>
                                    <input type="text" class="form-control" id="proveedor" name="proveedor"
                                        value="{{ $producto->proveedor }}">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
