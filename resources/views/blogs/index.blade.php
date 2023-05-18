@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Blogs</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-blog')
                                <a href="{{ route('blogs.create') }}" class="btn btn-warning">Nuevo</a>
                            @endcan


                            <table class="table table-stripped mt-2">
                                <thead style="background-color: #6777ef;" class="text-center">
                                    <th style="display:none">ID</th>
                                    <th style="color: #fff">Título</th>
                                    <th style="color: #fff">Contenido</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr class="text-center">
                                            <td style="display:none">{{ $blog->id }}</td>
                                            <td>{{ $blog->titulo }}</td>
                                            <td>{{ $blog->contenido }}</td>
                                            <td>
                                                @can('editar-blog')
                                                    <a href="{{ route('blogs.edit', $blog->id) }}"
                                                        class="btn btn-primary">Editar</a>
                                                @endcan

                                                @can('borrar-blog')
                                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
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
                                {!! $blogs->links() !!}
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
