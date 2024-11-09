@extends('layout/main')

@section('PageTitle', 'Agregar')

@section('Content')
    <div class="card">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
            
            <p class="card-text">
                <form action="{{route('game.store')}}" method="post">
                    @csrf
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                    <label for="">Descripcion</label>
                    <input type="text" name="descripcion" class="form-control" required>
                    <label for="">Genero</label>
                    <input type="text" name="genero" class="form-control" required>
                    <label for="">Plataforma</label>
                    <input type="text" name="plataforma" class="form-control" required>
                    <label for="">Precio</label>
                    <input type="text" name="precio" class="form-control" required>
                    <label for="">Desarrolladora</label>
                    <input type="text" name="desarrollador" class="form-control" required>
                    <br>
                    <button class="btn btn-primary">Agregar</button>

                    <a href="{{route('game.index')}}" class="btn btn-primary">Regresar</a>
                </form>
            </p>
            
        </div>
    </div>
@endsection
