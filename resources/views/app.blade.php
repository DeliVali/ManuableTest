@extends('Extensions.content')

@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
        <div class="navbar-nav ">
          <a class="nav-link" aria-current="page" href="{{ route('products.create') }}">Agregar productos</a>
          <a class="nav-link" href="{{ route('products.index', ['id'=>1]) }}">Ver productos</a>
        </div>
      </div>
    </div>
  </nav>
@endsection


@section('content')
    <div class="container py-5">
        <h1>Hola mundo</h1>
    </div>
@endsection