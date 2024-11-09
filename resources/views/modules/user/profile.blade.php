@extends('layout/mainv')


@section('PageTitle', Auth::user()->name )
    
 @section('Content')




 <div class="card">
    <h5 class="card-header">Luminux</h5>
    <div class="card-body">
        
        <h5 class="card-title"> Bienvenido {{ Auth::user()->name }}</h5>
       <br>
       
       @if(Auth::user()->rol === 'admin')
       <h5 class="card-title"> ¿Qué desear hacer?</h5>
        <p>
            <a href="{{ route('profile.create') }}" class="btn btn-primary">Crear nuevo usuario</a>
        </p>
        @endif
        <p class="card-text">
            <table class="table table-sm table-bordered">
                <thead>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>rol</th>
                    @if(Auth::user()->rol === 'admin')
                    <th>Editar</th>
                    <th>Eliminar</th>
                    @endif
                </thead>
                <tbody>
                    @if(isset($profile) && $profile->count() > 0)
                    @foreach ($profile as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->rol }}</td>
                            
                            @if(Auth::user()->rol === 'admin')
                            <td>
                                
                                <form action="{{ route('profile.edit', $item->id) }}" method="get">
                                    <button class="btn btn-warning btn-sm">
                                        <span><i class="fa-solid fa-pen"></i>Editar</span>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('profile.destroy', $item->id) }}" method="post" class="formulario-eliminar">
                                    @csrf   
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <span><i class="fa-solid fa-trash"></i>Eliminar</span>
                                    </button>
                                </form>
                               
                            </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="text-center">No hay datos disponibles</td>
                    </tr>
                @endif
                
                </tbody>

            </table>
            
        </p>
        
    </div>
    
</div>


 @endsection

 @section('js')
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            $('.formulario-eliminar').submit(function(e) {

                e.preventDefault(); 

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'No podrás revertir esta acción',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminarlo',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {

                    if (result.isConfirmed) {

                        Swal.fire({
                            title: 'Eliminado',
                            text: 'El registro ha sido eliminado.',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false 
                        }).then(() => {
                            this.submit();
                        });
                    }
                });
            });
        });
    </script>
    
 @endsection