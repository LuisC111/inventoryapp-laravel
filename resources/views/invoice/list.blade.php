@extends('layout')
@section('title','Invoices')
@section('encabezado','Lista de facturas')
@section('content')


<table class="table table-striped table-hover">
<thead>
<tr>
<th>ID</th>
<th>Fecha</th>
<th>Subtotal</th>
<th>Total</th>
<th></th>

</tr>
</thead>

<tbody>
@foreach ($invoices as $invoice)

<tr>
<td>{{ $invoice->id }}</td>
<td>{{ $invoice->created_at }}</td>
<td>$ {{ number_format($invoice->subtotal,0,",",".") }}</td>
<td>$ {{ number_format($invoice->total,0,",",".") }}</td>
<td>

    <a href="{{ route('categoriesDelete', ['id' => $categories->id]) }}" class="btn btn-danger">Borrar</a>
    <a href="{{ route('categories.form', ['id'=>$categories->id]) }}" class="btn btn-warning">Editar</a>

</td>
</tr>

@endforeach
</tbody>
</table>
@endsection
