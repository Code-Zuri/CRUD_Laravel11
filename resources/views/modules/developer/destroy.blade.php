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
                            <th>Ciudad</th>
                            <th>Sitio Web</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td>{{ $dev->name_dev }}</td>
                                <td>{{ $dev->country }}</td>
                                <td>{{ $dev->website }}</td>
                                    
                                </tr>
                            
                        </tbody>
                    </table>
                    <form action="{{ route('developer.destroy', $dev->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('developer.index')}}" class="btn btn-primary">Regresar</a>
                        <button class="btn btn-danger">Eliminar</button>
                    </form>
                  </div>
            </p>
            
        </div>
    </div>
@endsection
