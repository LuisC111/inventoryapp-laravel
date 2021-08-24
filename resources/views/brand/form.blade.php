@extends('layout')
@section('title', $brand ->id ? 'Actualizar Marca' : 'Nueva Marca' )
@section('encabezado',$brand ->id ? 'Actualizar Marca' : 'Nueva Marca')
@section('content')


   <form action="{{ route('brand.save') }}" method="POST">
@csrf
<input type="hidden" name="id" value="{{ old('id') ? old('id') :  $brand->id }}">
    <div class="col-md-4 mb-3">
        <label for="name">Name</label><br/>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                </div>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') :  $brand->name  }}">

        </div>
        @error('name')
        <p class="text text-danger">
            {{ $message }}
        </p>
        @enderror
      </div>



      <br/><a href="/brands" class="btn btn-danger ">Cancelar</Button></a>

     <button class="btn btn-success ">Guardar</Button>

   </form>


@endsection
