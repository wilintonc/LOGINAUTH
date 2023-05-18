@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revisa los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{route('roles.update', $role->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nombre del rol:</label>
                                        </div>
                                        <input type="text" name="name" class="form-control" value="{{$role->name}}">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="permission">Permisos para este rol:</label>
                                            <br />
                                            @foreach ($permission as $value)
                                                <label>
{{--                                                     @if (in_array($value->id, $rolePermissions))
                                                    <input type="checkbox" checked name="permission[]" value="{{ $value->id}}" class="name"> {{ $value->name }}</label>
                                                    @else
                                                    <input type="checkbox" name="permission[]" value="{{ $value->id}}" class="name"> {{ $value->name }}</label>
                                                    @endif --}}
                                                    <label>{{Form::checkbox('permission[]',  $value->id, in_array($value->id, $rolePermissions))}} {{ $value->name}}</label>
                                                <br />
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="colxs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
