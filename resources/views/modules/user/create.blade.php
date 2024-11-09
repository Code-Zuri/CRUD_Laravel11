@extends('layout/main')

@section('PageTitle', 'Agregar')

@section('Content')
    <div class="card">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
            
            <p class="card-text">
                <form action="{{route('profile.store')}}" method="post">
                    @csrf
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" required >

                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                
                
                    <label for="rol">Rol</label>
                    <select name="rol" class="form-control" required>
                        <option value="basic" >Basic</option>
                        <option value="admin" >Admin</option>
                    </select>
                    
                    
                    <br>
                    <button class="btn btn-primary">Agregar</button>

                    <a href="{{route('profile.index')}}" class="btn btn-primary">Regresar</a>
                </form>
            </p>
            
        </div>
    </div>
@endsection
