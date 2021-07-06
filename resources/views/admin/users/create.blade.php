@extends('admin.layouts.dashboard')
@section('content')

<h1>Create New  User</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/users" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">User name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name..." value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Email..." value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password..." required minlength="8">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Password Confirm</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Password..." id="password_confirmation">
    </div>
    <div class="form-group">
        <label for="fecha_nac">Fecha de nacimiento</label>
        <input type="date" name="fecha_nac" class="form-control" id="fecha_nac" placeholder="fecha_nac..." value="{{ old('fecha_nac') }}" required>
    </div>
    <div class="form-group">
        <label for="telefono">User telefono</label>
        <input type="text" name="telefono" class="form-control" id="telefono" placeholder="telefono..." value="{{ old('telefono') }}" required>
    </div>
    <div class="form-group">
        <label for="role">Select Role</label>
        ..........

    </div>

    <div id="permissions_box" >
        .......
    </div>

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>
</form>

@endsection
