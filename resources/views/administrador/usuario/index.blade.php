@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row justify-content-between">
                    <div class="col-sm-4">
                        <h2>Estado de <b>Usuarios</b></h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Apellido P.</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>cambiar estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->rut }}</td>
                            <td>{{ $user->nombre }}</td>
                            <td>{{ $user->apellido_paterno }}</td>
                            <td>{{ $user->telefono_movil }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rol }}</td>
                            @if ($user->status === 1)
                                <td><a class="btn btn-success" data-toggle="tooltip" data-placement="top"
                                        title="Deshabilita al usuario"
                                        href={{ route('cambiarEstado', ['id' => $user->id]) }}><i
                                            class="fas fa-check"></i></a></td>
                            @else
                                <td><a class="btn btn-warning" data-toggle="tooltip" data-placement="top"
                                        title="Habilita al usuario"
                                        href={{ route('cambiarEstado', ['id' => $user->id]) }}><i
                                            class="fas fa-ban"></i></a></td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay users en la base de datos</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>




        </div>
    </div>
    @if ($users->links())
        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
    @endif
@endsection
