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
                <form action="{{ route('plataform.update', $plataforms->id) }}" method="post">
                    @csrf
                    @method('put')
                    <label for="">Plataforma</label>
                    <input type="text" name="plataforma" class="form-control" required value="{{$plataforms->plataform}}">
                    <label for="">Fabricante</label>
                    <input type="text" name="fabricante" class="form-control" required value="{{$plataforms->fabric}}">



                                                     
                    <br>
                    <button class="btn btn-warning">Actualizar</button>

                    <a href="{{route('plataform.index')}}" class="btn btn-primary">Regresar</a>
                </form>
            </p>
            
        </div>
    </div>
@endsection
