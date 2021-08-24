<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate/Support/

class PersonaController extends Controller
{
    function  mostrarForm($id = null){
    if(!$id){
        return "Debe ingresar un ID";
    }
    return "Form id: ".$id;
    }
}


