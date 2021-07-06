@extends('admin.layouts.dashboard')
@section('content')
<h1>Update the Role</h1>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/grupos/{{$grupo->id}}">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="nombre">Nombre del grupo</label>
        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre del grupo..." value="{{$grupo>nombre}}" required>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion del grupo</label>
        <input type="text" name="descripcion" tag="descripcion" class="form-control" id="descripcion" placeholder="Role Slug..." value="{{$grupo->descripcion}}" required>
    </div>
    <div class="form-group" >
        <label for="accesos_grupos">Add Acceso</label>
        <input type="text" data-role="tagsinput" name="accesos_grupos" class="form-control" id="accesos_grupos" value="@foreach ($grupo->accesos as $accesos)
            {{$permission->name. ","}}
        @endforeach">
    </div>

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>
</form>

@section('css_role_page')
    <link rel="stylesheet" href="/css/admin/bootstrap-tagsinput.css">
@endsection

@section('js_role_page')
    <script src="/js/admin/bootstrap-tagsinput.js"></script>

    <script>
        $(document).ready(function(){
            $('#nombre').keyup(function(e){
                var str = $('#nombre').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//rplace stapces with dash
                $('#descripcion').val(str);
                $('#descripcion').attr('placeholder', str);
            });
        });

    </script>

@endsection



@endsection
