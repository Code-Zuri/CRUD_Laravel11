@extends('layout/main')

@section('PageTitle', 'Agregar')

@section('Content')
    <div class="card">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
            <p class="card-text">
                <form action="{{route('profile.store')}}" method="post" id="user-form">
                    @csrf
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" id="email">

                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password">

                    <label for="rol">Rol</label>
                    <select name="rol" class="form-control" id="rol">
                        <option value="basic" >Basic</option>
                        <option value="admin" >Admin</option>
                    </select>
                    
                    <br>
                    <button class="btn btn-primary" type="submit" id="submit-button">Agregar</button>

                    <a href="{{route('profile.index')}}" class="btn btn-primary">Regresar</a>
                </form>
            </p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#user-form').on('submit', function(event) {
                event.preventDefault();  

                var nombre = $('#nombre').val().trim();  
                var email = $('#email').val().trim();
                var password = $('#password').val().trim();
                var rol = $('#rol').val();

                console.log("Nombre: " + nombre);
                console.log("Email: " + email);
                console.log("Contraseña: " + password);
                console.log("Rol: " + rol);

                // Comprobamos si todos los campos están vacíos
                if (nombre === '' && email === '' && password === '' && rol === '') {
                    alert('No se llenó ningún dato');
                } else {
                    var missingFields = [];

                    if (nombre === '') missingFields.push('Nombre');
                    if (email === '') missingFields.push('Email');
                    if (password === '') missingFields.push('Contraseña');
                    if (rol === '') missingFields.push('Rol');

                    if (missingFields.length > 0) {
                        alert('Faltan los siguientes datos: ' + missingFields.join(', '));
                    } else {
                        var formData = {
                            _token: $('input[name="_token"]').val(),
                            nombre: nombre,
                            email: email,
                            password: password,
                            rol: rol
                        };

                        $.ajax({
                            url: $(this).attr('action'),
                            type: 'POST',
                            data: formData,
                            success: function(response) {
                                alert('Usuario agregado con éxito');
                                window.location.href = '{{route('profile.index')}}'; 
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr, status, error); 
                                alert('Hubo un error al agregar el usuario. Intenta de nuevo.');
                            }
                        });
                    }
                }
            });
        });
    </script>

@endsection
