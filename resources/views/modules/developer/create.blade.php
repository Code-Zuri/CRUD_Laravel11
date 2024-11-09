@extends('layout/main')

@section('PageTitle', 'Agregar')

@section('Content')
    <div class="card">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
            
            <p class="card-text">
                <form action="{{route('developer.store')}}" method="post">
                    @csrf
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                    <label for="">Ciudad</label>
                    <input type="text" name="ciudad" class="form-control" required>
                    <label for="">Citio web</label>
                    <input type="text" name="sitioweb" class="form-control" required>
                    
                    <br>
                    <button class="btn btn-primary">Agregar</button>

                    <a href="{{route('developer.index')}}" class="btn btn-primary">Regresar</a>
                </form>
            </p>
            
        </div>
    </div>
@endsection
