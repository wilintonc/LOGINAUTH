@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-rol')
                                <a href="{{ route('roles.create') }}" class="btn btn-warning">Nuevo</a>
                            @endcan


                            <table class="table table-stripped mt-2">
                                <thead style="background-color: #6777ef" class="text-center">
                                    <th style="color: #fff">Rol</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr class="text-center">
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                @can('editar-rol')
                                                    <a href="{{ route('roles.edit', $role->id) }}"
                                                        class="btn btn-primary">Editar</a>
                                                @endcan

                                                @can('borrar-rol')
                                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination  justify-content-end">
                                {!! $roles->links() !!}
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
