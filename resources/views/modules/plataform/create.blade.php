@extends('layout/main')

@section('PageTitle', 'Agregar')

@section('Content')
    <div class="card">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
            <p class="card-text">
                <form action="{{route('plataform.store')}}" method="post" id="plataform-form">
                    @csrf
                    <label for="plataforma">Plataforma</label>
                    <input type="text" name="plataforma" id="plataforma" class="form-control" >
                    <label for="fabricante">Fabricante</label>
                    <input type="text" name="fabricante" id="fabricante" class="form-control" >
                    <br>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                    <a href="{{route('plataform.index')}}" class="btn btn-primary">Regresar</a>
                </form>
            </p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
        $(document).ready(function() {
            $('#plataform-form').on('submit', function(event) {
                event.preventDefault();

                var plataforma = $('#plataforma').val().trim();
                var fabricante = $('#fabricante').val().trim();

                if (plataforma === '' || fabricante === '') {
                    var missingFields = [];
                    if (plataforma === '') missingFields.push('Plataforma');
                    if (fabricante === '') missingFields.push('Fabricante');
                    alert('Faltan los siguientes datos: ' + missingFields.join(', '));
                } else if (plataforma === '' && fabricante === '') {
                    alert('No se llenó ningún dato');
                } else {
                    var formData = {
                        _token: $('input[name="_token"]').val(),
                        plataforma: plataforma,
                        fabricante: fabricante
                    };

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            alert('Plataforma agregada con éxito');
                            window.location.href = '{{route('plataform.index')}}';
                        },
                        error: function(xhr, status, error) {
                            alert('Hubo un error al agregar la plataforma. Intenta de nuevo.');
                        }
                    });
                }
            });
        });
    </script>

@endsection


