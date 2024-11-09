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
                <form action="{{ route('developer.update', $dev->id) }}" method="post">
                    @csrf
                    @method('put')
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required value="{{$dev->name_dev}}">
                    <label for="">Ciudad</label>
                    <input type="text" name="ciudad" class="form-control" required value="{{$dev->country}}">

                    <label for="">Sitio web</label>
                    <input type="text" name="sitioweb" class="form-control" required value="{{$dev->website}}">

                                       
                    <br>
                    <button class="btn btn-warning">Actualizar</button>

                    <a href="{{route('developer.index')}}" class="btn btn-primary">Regresar</a>
                </form>
            </p>
            
        </div>
    </div>
@endsection
