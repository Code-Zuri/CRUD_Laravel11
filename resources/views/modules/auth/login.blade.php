@extends('layout/main')

@section('PageTitle', 'Inciar Sesion')

 @section('Content')
        <div class="box">
            <div class="container">
                <form action="{{ route('logear') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="top-header">
                    
                        <header>Iniciar Sesión</header>
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
                        <input type="submit" class="submit" value="Iniciar Sesión">

                    </div>
                    <div class="bottom">
                        
                        <div class="right">
                            <label><a href="{{ route('registro') }}">Crear cuenta</a></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
 @endsection