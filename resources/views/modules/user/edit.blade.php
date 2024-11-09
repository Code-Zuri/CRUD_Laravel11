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
                <form action="{{ route('profile.update', $profile->id) }}" method="post">
                    @csrf
                    @method('put')
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required value="{{$profile->name}}">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" required value="{{$profile->email}}">
                    <label for="rol">Rol</label>
                    <select name="rol" class="form-control" required>
                        <option value="admin" {{ $profile->rol == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="basic" {{ $profile->rol == 'basic' ? 'selected' : '' }}>Basic</option>
                    </select>


                                                     
                    <br>
                    <button class="btn btn-warning">Actualizar</button>

                    <a href="{{route('profile.index')}}" class="btn btn-primary">Regresar</a>
                </form>
            </p>
            
        </div>
    </div>
@endsection
