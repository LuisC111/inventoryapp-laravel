@extends('layout')
@section('title','Brand')
@section('encabezado','Lista de marcas')
@section('content')

@if (session()->has('messageD'))
<div class="alert alert-danger">
    {{ session()->get('messageD') }}
</div>
@endif

@if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<a href="{{ route('brand.form') }}" class="btn btn-primary" >Nueva Marca</a>
<table class="table table-striped table-hover">
<thead>
<tr>
<th>Name</th>

<th></th>
</tr>
</thead>

<tbody>
@foreach ($list as $brand)

<tr>
<td>{{ $brand -> name }}</td>
<td>

    <a href="{{ route('brandDelete', ['id' => $brand->id]) }}" class="btn btn-danger">Borrar</a>
    <a href="{{ route('brand.form', ['id'=>$brand->id]) }}" class="btn btn-warning">Editar</a>
    <!--<a href="/product/delete/{{ $brand->id }}" class="btn btn-danger">Borrar</a>-->

</td>
</tr>

@endforeach
</tbody>
</table>
@endsection
