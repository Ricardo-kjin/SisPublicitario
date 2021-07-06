@extends('admin.layouts.dashboard')
@section('content')

<h1>Create new Grupo</h1>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/grupos">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="nombre_grupo">Groups name</label>
        <input type="text" name="nombre_grupo" class="form-control" id="nombre_grupo" placeholder="Groups name..." value="{{ old('nombre_grupo') }}" required>
    </div>
    <div class="form-group">
        <label for="descripcion">Descipcion</label>
        <input type="text" name="descripcion" tag="descripcion" class="form-control" id="descripcion" placeholder="Descipcion..." value="{{ old('descripcion') }}" required>
    </div>
    <div class="form-group" >
        <label for="accesos_grupos">Add Permissions</label>
        <input type="text" data-role="tagsinput" name="accesos_grupos" class="form-control" id="accesos_grupos" value="{{ old('accesos_grupos') }}">
    </div>

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>
</form>

@endsection
