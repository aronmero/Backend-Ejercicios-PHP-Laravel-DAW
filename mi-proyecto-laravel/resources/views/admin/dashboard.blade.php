@extends('layouts.cabecera')

@section('title', 'Home')

@section('content')
    <div>
        <a href="{{ route('home') }}">Inicio</a>
    </div>
    <div>
        <a href="{{ route('profesores.create') }}">Añadir Usuario</a>
    </div>

    <div>
        <table>
            <thead>
                <td>Nombre</td>
                <td>primerApellido</td>
                <td>segundoApellido</td>
                <td>email</td>
                @can('admin.actividades.edit')
                    <td></td>
                @endcan
                @can('admin.actividades.destroy')
                    <td></td>
                @endcan
            </thead>

            @forelse ($profesores as $profesor)
                <tr>
                    <td>{{ $profesor->nombre }}</td>
                    <td>{{ $profesor->primerApellido }}</td>
                    <td>{{ $profesor->segundoApellido }}</td>
                    <td>{{ $profesor->email }}</td>
                    @can('admin.usuario.edit')
                        <td><a href="{{ route('profesores.edit', $profesor) }}">Editar</a></td>
                    @endcan
                    @can('admin.usuario.destroy')
                        <td>
                            <form action="{{ route('profesores.destroy', $profesor) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" name="id" value="Eliminar">
                            </form>
                        </td>
                    @endcan
                </tr>
            @empty
                <tr>
                    <td>No hay actividades</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection