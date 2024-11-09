@extends('layout/main')

@section('PageTitle', 'Agregar')

@section('Content')
    <div class="card">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
            
            <p class="card-text">
                <form action="{{route('plataform.store')}}" method="post">
                    @csrf
                    <label for="">Plataforma</label>
                    <input type="text" name="plataforma" class="form-control" required>
                    <label for="">Fabricante</label>
                    <input type="text" name="fabricante" class="form-control" required>
                    
                    <br>
                    <button class="btn btn-primary">Agregar</button>

                    <a href="{{route('plataform.index')}}" class="btn btn-primary">Regresar</a>
                </form>
            </p>
            
        </div>
    </div>
@endsection
