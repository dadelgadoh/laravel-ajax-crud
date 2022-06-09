@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex bd-highlight mb-4">
        <div class="p-2 w-100 bd-highlight">
            <h2>Laravel AJAX </h2>
        </div>
        <div class="p-2 flex-shrink-0 bd-highlight">
            <button class="btn btn-success" id="btn-add">
                Agregar Usuario
            </button>
        </div>
    </div>
    <div>
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="usuarios-list" name="usuarios-list">
                @foreach ($usuario as $data)
                <tr id="usuario{{$data->id}}">
                    <td>{{$data->id}}</td>
                    <td>{{$data->nombre}}</td>
                    <td>{{$data->usuario}}</td>
                    <td><button class="edit-modal btn btn-info" data-id="{{$data->id}}" data-name="{{$data->nombre}}" data-user="{{$data->usuario}}">
                            <span class="glyphicon glyphicon-edit"></span> Editar
                        </button>
                        <button class="delete-modal btn btn-danger" data-id="{{$data->id}}">
                            <span class="glyphicon glyphicon-trash"></span> Eliminar
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="formModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="formModalLabel">Crear Usuario</h4>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" name="myForm" class="form-horizontal" novalidate="">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduzca nombre" value="">
                            </div>
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Introduzca usuario" value="">
                            </div>
                            <!-- <div class="form-group">
                                <label>Description</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        placeholder="Enter Description" value="">
                            </div> -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Guardar cambios
                        </button>
                        <input type="hidden" id="usuario_id" name="usuario_id" value="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection