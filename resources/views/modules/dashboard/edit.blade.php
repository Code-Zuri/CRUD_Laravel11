@extends('layout/main')

@section('PageTitle', 'Editar')

@section('Content')
    <div class="card">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
                    @php
                   // print_r($games);
                @endphp
            <p class="card-text">
                <form action="{{ route('game.update', $games->id) }}" method="post">
                    @csrf
                    @method('put')
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required value="{{$games->name}}">
                    <label for="">Descripcion</label>
                    <input type="text" name="descripcion" class="form-control" required value="{{$games->description}}">
                    <label for="">Genero</label>
                    <input type="text" name="genero" class="form-control" required value="{{$games->genere}}">
                    <label for="">Plataforma</label>
                    <input type="text" name="plataforma" class="form-control" required value="{{$games->plataform}}">
                    <label for="">Precio</label>
                    <input type="text" name="precio" class="form-control" required value="{{$games->price}}">
                    <label for="">Desarrolladora</label>
                    <input type="text" name="desarrollador" class="form-control" required value="{{$games->developer}}">
                    <br>
                    <button class="btn btn-warning">Actualizar</button>

                    <a href="{{route('game.index')}}" class="btn btn-primary">Regresar</a>
                </form>
            </p>
            
        </div>
    </div>
@endsection
