<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    function show(){
        $categoriesList = Categories::all();
        return view('Categories/list',["list" => $categoriesList]);
    }

    function delete($id){
        //Product::destroy($id);
        $categories = Categories::find($id);
        $categories->delete();
        return redirect('/categories')->with('messageD', 'Categoría eliminada');
        //return redirect()->route('products');
    }

    function form($id = null){
        if($id == null){
            $categories = new Categories();
        }else{
            $categories = Categories::findOrFail($id);
        }
        return view('/categories/form',['categories' => $categories]);
    }

    function save(Request $request){
        $categories = new Categories();

        if($request->id > 0){
            $categories = Categories::findOrFail($request->id);
        }

        $request-> validate([
            'name' => 'required|max:50',
        ]);


        $categories->name = $request->name;


        $categories->save();
        return redirect('/categories')->with('message', 'Categoría guardada');

    }
}
