@extends('layout')
@section('title', 'Nueva Factura' )
@section('encabezado', 'Nueva Factura')
@section('content')

<form action="" method="POST">
  @csrf

  <div class="row">
  <div class="col-sm-6">
  <select name="product[]" id="product" class="form-select">
  @foreach ($products as $product)
    <option value="{{ $product->id }}">{{ $product->name }}</option>
  @endforeach
  </select>

    </div>
  <div class="col-sm-2">
  <input type="number" name="quantity[]" class="form-control" placeholder="Cantidad">
  </div>



  </div>

</form>


@endsection

@section('scripts')
<script>
  alert("Hola")
</script>
@endsection