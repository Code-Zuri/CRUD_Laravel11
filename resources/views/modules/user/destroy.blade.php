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
                            <th>Email</th>
                            <th>Rol</th>

                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td>{{ $profile->name}}</td>
                                <td>{{ $profile->email}}</td>
                                <td>{{ $profile->rol}}</td>
                                    
                                </tr>
                            
                        </tbody>
                    </table>
                    <form action="{{ route('profile.destroy', $profile->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('profile.index')}}" class="btn btn-primary">Regresar</a>
                        <button class="btn btn-danger  ">Eliminar</button>
                    </form>
                  </div>
            </p>
            
        </div>
    </div>
@endsection
