@extends('layout/main')

@section('PageTitle', 'Agregar')

@section('Content')
    <div class="card">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
            <p class="card-text">
                <form action="{{route('game.store')}}" method="post" id="game-form">
                    @csrf
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                    <label for="descripcion">Descripción</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control">
                    <label for="genero">Género</label>
                    <input type="text" name="genero" id="genero" class="form-control">
                    <label for="plataforma">Plataforma</label>
                    <input type="text" name="plataforma" id="plataforma" class="form-control">
                    <label for="precio">Precio</label>
                    <input type="text" name="precio" id="precio" class="form-control">
                    <label for="desarrollador">Desarrolladora</label>
                    <input type="text" name="desarrollador" id="desarrollador" class="form-control">
                    <br>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                    <a href="{{route('game.index')}}" class="btn btn-primary">Regresar</a>
                </form>
            </p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#game-form').on('submit', function(event) {
                event.preventDefault();

                var nombre = $('#nombre').val().trim();
                var descripcion = $('#descripcion').val().trim();
                var genero = $('#genero').val().trim();
                var plataforma = $('#plataforma').val().trim();
                var precio = $('#precio').val().trim();
                var desarrollador = $('#desarrollador').val().trim();

                // Imprimir los valores en consola
                console.log("Nombre: " + nombre);
                console.log("Descripción: " + descripcion);
                console.log("Género: " + genero);
                console.log("Plataforma: " + plataforma);
                console.log("Precio: " + precio);
                console.log("Desarrolladora: " + desarrollador);

                // Comprobamos si todos los campos están vacíos
                if (nombre === '' && descripcion === '' && genero === '' && plataforma === '' && precio === '' && desarrollador === '') {
                    alert('No se llenó ningún dato');
                } else {
                    var missingFields = [];
                    
                    if (nombre === '') missingFields.push('Nombre');
                    if (descripcion === '') missingFields.push('Descripción');
                    if (genero === '') missingFields.push('Género');
                    if (plataforma === '') missingFields.push('Plataforma');
                    if (precio === '') missingFields.push('Precio');
                    if (desarrollador === '') missingFields.push('Desarrolladora');

                    if (missingFields.length > 0) {
                        alert('Faltan los siguientes datos: ' + missingFields.join(', '));
                    } else {
                        var formData = {
                            _token: $('input[name="_token"]').val(),
                            nombre: nombre,
                            descripcion: descripcion,
                            genero: genero,
                            plataforma: plataforma,
                            precio: precio,
                            desarrollador: desarrollador
                        };

                        $.ajax({
                            url: $(this).attr('action'),
                            type: 'POST',
                            data: formData,
                            success: function(response) {
                                alert('Juego agregado con éxito');
                                window.location.href = '{{route('game.index')}}';
                            },
                            error: function(xhr, status, error) {
                                alert('Hubo un error al agregar el juego. Intenta de nuevo.');
                            }
                        });
                    }
                }
            });
        });
    </script>
@endsection
