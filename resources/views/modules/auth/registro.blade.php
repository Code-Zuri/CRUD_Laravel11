@extends('layout/main')

@section('PageTitle', 'Registrarse')
    
 @section('Content')
        <div class="box">
            <div class="container">
                <form action="{{ route('registrar') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="top-header">
                        <span>¿No tienes cuenta?</span>
                        <header>Crear Cuenta</header>
                    </div>
                    <div class="input-field">
                   
                        <input type="text" class="input" name="name" id="name" placeholder="Nombre" required>
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-field">
                   
                        <input type="text" class="input" name="email" id="email" placeholder="Correo" required>
                        <i class='bx bx-envelope'></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="input" name="password" id="password" placeholder="Contraseña" required>
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-field">
                        <input type="submit" class="submit" value="Regirtrar">

                    </div>
                    <div class="bottom">
                        
                        <div class="right">
                            <label><a href="{{ route('login') }}">Iniciar Sesión</a></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
 @endsection