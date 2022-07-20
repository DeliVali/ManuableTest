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
        <h1>Listado de productos</h1>
        @if (Session::has('Mensaje'))

        <div class="alert alet-info my-5">
            {{Session::get('Mensaje')}}
        </div>
            
        @endif
        <table class="table">
            <thead>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>SKU</th>
                <th>Cantidad</th>
                <th>Categoria</th>
                <th>Esta en temporada?</th>
            </thead>
            <tbody>
                    @forelse ($products as $product )
                    <tr>
                        <td><img src="{{$product->image}}" style="width:100px;height:100px"  alt=""></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->SKU}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        
                        <td>{{$seasonal=$product->is_seasonal==1? 'true':'false';}}</td>
                        <td>
                            <div class="d-flex">
                            <a class="btn btn-warning" href="{{ route('products.edit', $product) }}">Editar</a>
                            <form action="{{ route('products.destroy', $product) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger ms-2" >Eliminar</button>
                                
                            </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr><td class="text-center" colspan="7">No Hay Registros</td></tr>
                    @endforelse
                

            </tbody>
        </table>
    </div>
@endsection