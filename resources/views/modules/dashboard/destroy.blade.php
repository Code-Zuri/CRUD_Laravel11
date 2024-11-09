@extends('layout/main')

@section('PageTitle', 'Eliminar')

@section('Content')
    <div class="card">
        <h5 class="card-header">Eliminar</h5>
        <div class="card-body">
            
            <p class="card-text">
                <div class="alert alert-danger" role="alert">
                   ¿Deseas eliminar este registro?.
                    <table class="table table-sm table-bordered">
                        <thead>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Genero</th>
                            <th>Plataforma</th>
                            <th>Precio</th>
                            <th>Desarrolladora</th>
                           
                        </thead>
                        <tbody>
                            
                                <tr>
                                    <td>{{ $games->name }}</td>
                                    <td>{{ $games->description }}</td>
                                    <td>{{ $games->genere }}</td>
                                    <td>{{ $games->plataform }}</td>
                                    <td>{{ $games->price }}</td>
                                    <td>{{ $games->developer }}</td>
                                    
                                </tr>
                            
                        </tbody>
                    </table>
                    <form action="{{ route('game.destroy', $games->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('game.index')}}" class="btn btn-primary">Regresar</a>
                        <button class="btn btn-danger">Eliminar</button>
                    </form>
                  </div>
            </p>
            
        </div>
    </div>
@endsection
