<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    function show(){
        $brandList = Brand::all();
        return view('brand/list',["list" => $brandList]);
    }

    function delete($id){
        //Product::destroy($id);
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('/brands')->with('messageD', 'Marca eliminada');
        //return redirect()->route('products');
    }

    function form($id = null){
        if($id == null){
            $brand = new Brand();
        }else{
            $brand = Brand::findOrFail($id);
        }
        return view('/brand/form',['brand' => $brand]);
    }

    function save(Request $request){
        $brand = new Brand();

        if($request->id > 0){
            $brand = Brand::findOrFail($request->id);
        }

        $request-> validate([
            'name' => 'required|max:50',
        ]);


        $brand->name = $request->name;


        $brand->save();
        return redirect('/brands')->with('message', 'Marca guardada');

    }
}
