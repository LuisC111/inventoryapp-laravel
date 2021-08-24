@extends('layout')
@section('title', $categories ->id ? 'Actualizar Marca' : 'Nueva Categoría' )
@section('encabezado',$categories ->id ? 'Actualizar Marca' : 'Nueva Categoría')
@section('content')


   <form action="{{ route('categories.save') }}" method="POST">
@csrf
<input type="hidden" name="id" value="{{ old('id') ? old('id') :  $categories->id }}">
    <div class="col-md-4 mb-3">
        <label for="name">Name</label><br/>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                </div>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') :  $categories->name  }}">

        </div>
        @error('name')
        <p class="text text-danger">
            {{ $message }}
        </p>
        @enderror
      </div>

      <div class="col-md-4 mb-3">
        <label for="description">Description</label><br/>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                </div>
          <input type="text" class="form-control" id="description" name="description" value="{{ old('name') ? old('name') :  $categories->description  }}">

        </div>
        @error('description')
        <p class="text text-danger">
            {{ $message }}
        </p>
        @enderror
      </div>


      <br/><a href="/categories" class="btn btn-danger ">Cancelar</Button></a>

     <button class="btn btn-success ">Guardar</Button>

   </form>


@endsection
