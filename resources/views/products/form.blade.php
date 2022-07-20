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
 <div class="container">
    @if (isset($products))
    <h1 class="text-center">Editar producto</h1>
    @else
        <h1 class="text-center">Crear producto</h1>
    @endif
    



    @if (isset($products))
    
    <form action="{{ route('products.update',$products) }}" method="post">
    @method('PUT') 

    @else
    <form action="{{ route('products.store') }}" method="post">
    @endif
  

        @csrf
        <div class="container m-5 justify-content-center">
        <div class="mb-3 ">
            <label for="productName" class="form-label">Nombre del producto</label>
            <input type="text" name="name" class="form-control" id="productName" value="{{old('name') ?? @$products->name}}" >
           @error('name')
           <div class="alert alert-danger mt-2" role="alert">
           {{$message}}
          </div>
           @enderror
          </div>


          <div class="d-flex justify-content-center">
          <div class="mb-3 w-25">
            <label for="productPrice" class="form-label">Precio del producto</label>
            <input type="number" name="price" class="form-control" id="productPrice" step="0.1" value="{{old('price') ?? @$products->price}}" >
            @error('price')
            <div class="alert alert-danger mt-2" role="alert">
            {{$message}}
           </div>
            @enderror
          </div>

          <div class="mb-3 w-25 ms-1 ">
            <label for="productSku" class="form-label">Codigo del articulo</label>
            <input type="number" name="SKU" class="form-control" id="productSku" value="{{old('SKU')?? @$products->SKU}}" >
            @error('SKU')
            <div class="alert alert-danger mt-2" role="alert">
            {{$message}}
           </div>
            @enderror

          </div>
          
          <div class="mb-3 w-25 ms-1 ">
            <label for="productQuantity" class="form-label">Cantidad</label>
            <input type="text" name="quantity" class="form-control" id="productQuantity" value="{{old('quantity')?? @$products->quantity}}" >
            @error('quantity')
           <div class="alert alert-danger mt-2" role="alert">
           {{$message}}
          </div>
           @enderror
          </div>

          <div class="w-25 mb-3 ms-1">
            <label class="form-label" for="productCategory">Categoria del producto:</label>
            <select class="form-select" name="category" id="productCategory">
            <option value="0">Seleccione una categoria...</option>

              @if (isset($products)&& $products->category=='Vegetales')
              <option selected value="1">Vegetales</option>
              @else
              <option value="1">Vegetales</option>
              @endif  

              @if (isset($products)&& $products->category=='Frutas')
              <option selected value="2">Frutas</option>
              @else
              <option value="2">Frutas</option>
              @endif 
              
              
              
              
            </select>
            @error('category')
           <div class="alert alert-danger mt-2" role="alert">
           {{$message}}
          </div>
           @enderror
          </div>

          </div>

          <div class=" mb-3">
            <label class="form-label" for="imageUpload">Suba una imagen</label>
            <input type="file" name="image" class="form-control" id="imageUpload" value="{{old('image')?? @$products->image}}">
          </div>

          <div class="form-check form-switch float-start">
            <input class="form-check-input" name="is_seasonal" type="checkbox" id="isSeasonal">
            <label class="form-check-label" for="isSeasonal">Esta en temporada?</label>
          </div>

          <div class="float-end">
            @if (isset($products))
            <button type="submit" class="btn btn-outline-primary ">Editar Producto</button>
            @else
            <button type="submit" class="btn btn-outline-primary ">Agregar Producto</button>
            @endif
          
        </div>

        </div>
    </form>
 </div>
@endsection