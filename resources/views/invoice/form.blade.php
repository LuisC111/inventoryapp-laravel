@extends('layout')
@section('title', 'Nueva Factura' )
@section('encabezado', 'Nueva Factura')
@section('content')

<form action="" method="POST" id="invoiceForm">
  @csrf
  <div class="row">
    <div class="col-sm-3"><b>Producto</b></div>
    <div class="col-sm-3"><b>Cantidad</b></div>
    <div class="col-sm-3"><b>Precio</b></div>
    <div class="col-sm-3"><b>Total Producto</b></div>

  </div>
  <div class="row">
  <div class="col-sm-3">
  <select name="product[]" id="product" class="form-select product">
      <option value="">Seleccione un producto</option>
  @foreach ($products as $product)
    <option value="{{ $product->id }}">{{ $product->name }}</option>
  @endforeach
  </select>

    </div>
  <div class="col-sm-3">
  <input type="number" name="quantity[]" class="form-control quantity" min="1" value="1" placeholder="Cantidad">
  </div>
<div class="col-sm-3 col-price">
    <input type="number" name="price[]" class="form-control price" >
</div>

<div class="col-sm-3">
<input type="text" readonly class="form-control-plaintext totalProduct">
  </div>
  <br> <br>
  </div>

</form>
<button type="button" class="btn btn-success" id="add"><b>+</b></button>


@endsection

@section('scripts')
<script>
    const products = @JSON($products);

    let productList = document.querySelector('.product')
    let priceElement = document.querySelector('.price')
    const quantityElement = document.querySelector('.quantity')

    function init(){
        arrProductList = document.querySelectorAll('.product')

    arrProductList.forEach(productList => {
        //priceElement = productList.closest('.row .col-price .price')
        console.log(priceElement)
        productList.addEventListener('change', (event) =>{
            productId = event.target.value;
            productSelected = products.filter( product => product.id == productId )
            console.log(productSelected[0].price)
            priceElement.value = productSelected[0].price;
        //totalProduct()
            })
        });
    }
    init()



    function totalProduct(){
        totalElement = document.querySelector('.totalProduct')
        totalElement.value = priceElement.value * quantityElement.value;
    }

    priceElement.addEventListener('input', (event) => {
        totalProduct();
    })

    quantityElement.addEventListener('input', (event) => {
        totalProduct();
    })

    const addButton = document.querySelector('#add')
    addButton.addEventListener('click', (event) => {
        fila = document.createElement('div')
        fila.className = 'row'

        fila.innerHTML = `
        <div class="col-sm-3">
  <select name="product[]" id="product" class="form-select product">
    <option value="">Seleccione un producto</option>
  @foreach ($products as $product)
    <option value="{{ $product->id }}">{{ $product->name }}</option>
  @endforeach
  </select>

    </div>
<div class="col-sm-3">
  <input type="number" name="quantity[]" class="form-control quantity" min="1" value="1" placeholder="Cantidad">
  </div>
<div class="col-sm-3">
    <input type="number" name="price[]" class="form-control price" >
</div>
<div class="col-sm-3">
<input type="text" readonly class="form-control-plaintext totalProduct">
  </div>
  <br> <br>`;

  form = document.querySelector('#invoiceForm')
    form.appendChild(fila)
    init()
    })




</script>
@endsection
