<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Categories;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //listar productos
    function show(){
        $productsList = Product::has('brand')->get();
        return view('product/list',['productsList' => $productsList]);


    }
    function delete($id){
        //Product::destroy($id);
        $producto = Product::find($id);
        $producto->delete();
        return redirect('/products')->with('messageD', 'Producto eliminado');
        //return redirect()->route('products');
    }

    function form($id = null){
        if($id == null){
            $product = new Product();
        }else{
            $product = Product::findOrFail($id);
        }
        $brands = Brand::all();
        $categories = Categories::all();
        return view('product/form',['product' => $product, 'categories' => $categories, 'brands' => $brands]);

    }

    function save(Request $request){
        $product = new Product();

        if($request->id > 0){
            $product = Product::findOrFail($request->id);
        }

        $request-> validate([
            'name' => 'required|max:50',
            'cost' => 'required',
            'price' => 'required',
            'quantity' => 'required|numeric',
            'brand' => 'required',
            'categories' => 'required',
        ]);


        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand;
        $product->categories_id = $request->categories;


        $product->save();
        return redirect('/products')->with('message', 'Producto guardado');

    }
}

