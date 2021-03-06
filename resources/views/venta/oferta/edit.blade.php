@extends('admin.layouts.dashboard')
@section('content')
<h1>Editar Oferta</h1>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/ofertas/{{$oferta->id_ofertas}}">

    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre de oferta</label>
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre ..." value="{{ $oferta->nombre }}" >
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="duracion">Duracion</label>
                <input type="text" name="duracion" tag="duracion" class="form-control" id="duracion" placeholder="Duracion..." value="{{ $oferta->duracion }}" >
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="costo">Costo</label>
                <input type="numeric" name="costo" tag="costo" class="form-control" id="costo" placeholder="Costo..." value="{{ $oferta->costo }}" >
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="numero_publicaciones"># publicaciones</label>
                <input type="number" min="0" name="numero_publicaciones" tag="numero_publicaciones" class="form-control" id="numero_publicaciones" placeholder="# de publicaciones..." value="{{ $oferta->numero_publicaciones }}" >
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">descripcion</label>
                <input type="text" name="descripcion" tag="descripcion" class="form-control" id="descripcion" placeholder="Descipcion..." value="{{ $oferta->descripcion }}" >
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="plane"> <b> Seleccionar Plan</b></label>
            <select class="grupo form-control" name="plane" id="plane">
                <option value="">Planes....</option>
                @foreach ($planes as $plane)
                    <option data-plane-id="{{$plane->id_planes}}" data-plane-slug="{{$plane->descripcion}}" value="{{$plane->id_planes}}" {{ $plane->nombre == $oferta->plane->first()->nombre ? "selected" : ""}}>{{$plane->nombre}}</option>
                @endforeach

            </select>
        </div>
    </div>
    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
        <a href="{{ url()->previous() }}" class="btn btn-danger">Cancelar</a>
    </div>
</form>

@endsection
