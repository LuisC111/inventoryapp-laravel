@extends('layout')
@section('title', $product ->id ? 'Actualizar Producto' : 'Nuevo Producto' )
@section('encabezado',$product ->id ? 'Actualizar Producto' : 'Nuevo Producto')
@section('content')


   <form action="{{ route('product.save') }}" method="POST">
@csrf
<input type="hidden" name="id" value="{{ old('id') ? old('id') :  $product->id }}">
    <div class="col-md-4 mb-3">
        <label for="name">Name</label><br/>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                </div>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') :  $product->name  }}">

        </div>
        @error('name')
        <p class="text text-danger">
            {{ $message }}
        </p>
        @enderror
      </div>

      <div class="col-md-4 mb-3">
        <label for="cost">Cost</label><br/>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">$</span>
                </div>
          <input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost') ? old('cost') :  $product->cost  }}">
        </div>
        @error('cost')
        <p class="text text-danger">
            {{ $message }}
        </p>
        @enderror
      </div>

      <div class="col-md-4 mb-3">
        <label for="price">Price</label><br/>
        <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupPrepend">$</span>
        </div>
          <input type="text" class="form-control" id="price" name="price" value="{{ old('price') ? old('price') :  $product->price }}">
        </div>
        @error('price')
        <p class="text text-danger">
            {{ $message }}
        </p>
        @enderror
      </div>

      <div class="col-md-4 mb-3">
        <label>Quantity</label><br/>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">#</span>
                </div>
          <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') ? old('quantity') :  $product->quantity }}">
        </div>
        @error('quantity')
        <p class="text text-danger">
            {{ $message }}
        </p>
        @enderror
      </div>

      <div class="col-md-4 mb-3">
        <label>Brand</label><br/>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                </div>

          <select name="brand" class="form-select">
              @foreach ($brands as $brand)
              <option value="{{ $brand->id }}"
                {{ $product->brand_id == $brand->id ? "selected" : "" }}>
                {{ $brand->name }}
            </option>
              @endforeach
          </select>
        </div>
        @error('brand')
        <p class="text text-danger">
            {{ $message }}
        </p>
        @enderror
      </div>

      <div class="col-md-4 mb-3">
        <label>Category</label><br/>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                </div>

          <select name="categories" class="form-select">
              @foreach ($categories as $category)
              <option value="{{ $category->id }}"
                {{ $product->category == $category->id ? "selected" : "" }}>
                {{ $category->name }}
            </option>
              @endforeach
          </select>
        </div>
        @error('categories')
        <p class="text text-danger">
            {{ $message }}
        </p>
        @enderror
      </div>

      <br/><a href="/products" class="btn btn-danger ">Cancelar</Button></a>

     <button class="btn btn-success ">Guardar</Button>

   </form>


@endsection
