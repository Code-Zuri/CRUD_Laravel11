@extends('layout/main')

@section('PageTitle', 'Agregar')

@section('Content')
    <div class="card">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
            <p class="card-text">
                <form action="{{route('developer.store')}}" method="post" id="developer-form">
                    @csrf
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" name="ciudad" id="ciudad" class="form-control">
                    <label for="sitioweb">Sitio Web</label>
                    <input type="text" name="sitioweb" id="sitioweb" class="form-control">
                    <br>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                    <a href="{{route('developer.index')}}" class="btn btn-primary">Regresar</a>
                </form>
            </p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#developer-form').on('submit', function(event) {
                event.preventDefault();

                var nombre = $('#nombre').val().trim();
                var ciudad = $('#ciudad').val().trim();
                var sitioweb = $('#sitioweb').val().trim();

                // Imprimir los valores en la consola
                console.log("Nombre: " + nombre);
                console.log("Ciudad: " + ciudad);
                console.log("Sitio Web: " + sitioweb);

                if (nombre === '' && ciudad === '' && sitioweb === '') {
                    alert('No se llenó ningún dato');
                } else if (nombre === '' || ciudad === '' || sitioweb === '') {
                    var missingFields = [];
                    if (nombre === '') missingFields.push('Nombre');
                    if (ciudad === '') missingFields.push('Ciudad');
                    if (sitioweb === '') missingFields.push('Sitio Web');
                    alert('Faltan los siguientes datos: ' + missingFields.join(', '));
                } else {
                    var formData = {
                        _token: $('input[name="_token"]').val(),
                        nombre: nombre,
                        ciudad: ciudad,
                        sitioweb: sitioweb
                    };

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            alert('Desarrollador agregado con éxito');
                            window.location.href = '{{route('developer.index')}}';
                        },
                        error: function(xhr, status, error) {
                            alert('Hubo un error al agregar el desarrollador. Intenta de nuevo.');
                        }
                    });
                }
            });
        });
    </script>
@endsection
