@extends('layout')
@section('title','Categories')
@section('encabezado','Lista de categorias')
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

<a href="{{ route('categories.form') }}" class="btn btn-primary" >Nueva Categoría</a>
<table class="table table-striped table-hover">
<thead>
<tr>
<th>Name</th>
<th>Description</th>


<th></th>
</tr>
</thead>

<tbody>
@foreach ($list as $categories)

<tr>
<td>{{ $categories -> name }}</td>
<td>{{ $categories -> description }}</td>
<td>

    <a href="{{ route('categoriesDelete', ['id' => $categories->id]) }}" class="btn btn-danger">Borrar</a>
    <a href="{{ route('categories.form', ['id'=>$categories->id]) }}" class="btn btn-warning">Editar</a>
    <!--<a href="/product/delete/{{ $categories->id }}" class="btn btn-danger">Borrar</a>-->

</td>
</tr>

@endforeach
</tbody>
</table>
@endsection
