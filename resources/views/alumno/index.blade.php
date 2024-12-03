<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alumnos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="alert alert-success" id="success-message">
                            {{ session('success') }}
                        </div>
                    @endif
                    <!-- Button trigger modal -->
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Registrar
                        </button>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumnos as $alumno)
                                <tr>
                                    <th scope="row">{{$alumno->id_alumno}}</th>
                                    <td>{{$alumno->nombre_alumno}}</td>
                                    <td>{{$alumno->apellido_alumno}}</td>
                                    <td>{{$alumno->edad_alumno}}</td>
                                    <td>{{$alumno->curso_asignado}}</td>
                                    <td>
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarModal{{$alumno->id_alumno}}">Actualizar</button>
                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal{{$alumno->id_alumno}}">Eliminar</button>
                                    </td>
                                </tr>
                                <!--Editar Modal-->
                                <div class="modal fade" id="editarModal{{$alumno->id_alumno}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Alumno</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('alumnos.update',$alumno->id_alumno)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                      <label for="nombre" class="form-label">Nombre</label>
                                                      <input type="text" class="form-control" name="nombre_alumno" value="{{$alumno->nombre_alumno}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="apellido" class="form-label">Apellido</label>
                                                        <input type="text" class="form-control" name="apellido_alumno" value="{{$alumno->apellido_alumno}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edad" class="form-label">Edad</label>
                                                        <input type="number" class="form-control" name="edad_alumno" value="{{$alumno->edad_alumno}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="curso" class="form-label">Curso asignado</label>
                                                        <input type="text" class="form-control" name="curso_asignado" value="{{$alumno->curso_asignado}}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Cierre Editar Modal-->

                                <!--Modal Eliminar-->
                                <div class="modal fade" id="eliminarModal{{$alumno->id_alumno}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Alumno</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('alumnos.destroy',$alumno->id_alumno)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <h3>¿Seguro que quieres eliminar el registro del alumno?</h3>
                                                    <div class="modal-footer mt-3">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Cierre Eliminar Modal-->
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Alumno</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('alumnos.index')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                          <label for="nombre" class="form-label">Nombre</label>
                                          <input type="text" class="form-control" name="nombre_alumno" id="nombre">
                                        </div>
                                        <div class="mb-3">
                                            <label for="apellido" class="form-label">Apellido</label>
                                            <input type="text" class="form-control" name="apellido_alumno" id="apellido">
                                        </div>
                                        <div class="mb-3">
                                            <label for="edad" class="form-label">Edad</label>
                                            <input type="number" class="form-control" name="edad_alumno" id="exampleInputEmail1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="curso" class="form-label">Curso asignado</label>
                                            <input type="text" class="form-control" name="curso_asignado" id="exampleInputEmail1">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
                // Verificar si el mensaje de éxito existe
                if ($('#success-message').length) {
                    // Esperar 3 segundos antes de ocultarlo
                    setTimeout(function() {
                        $('#success-message').fadeOut(); // Desaparecer el mensaje con un efecto suave
                    }, 4000); // 3000 milisegundos = 3 segundos
                }
            });
    </script>
</x-app-layout>
