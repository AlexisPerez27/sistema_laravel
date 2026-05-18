<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Prueba extends Controller
{
    function index(){
        // simulacion de obtencion de datos de la bd
        $datos_bd = ['dato1', 'dato2'];
        $categorias =['categoria1','categoria2'];

        // asi es como tradicionalmente se envian los datos a la vista desde una variable
        // NOTA: aqui se puede ver que el nombre de la variable de los datos de la bd es distinto a la variabale que recibe la vista
        // return view("contacto", ["datos"=>$datos_bd,"categorias"=>$categorias]);


        // esta funcion manda a la vista nuestros datos obtenidos de la bd
        // NOTA: el nombre que va dentro de compact es el mismo que recibe la vista y tiene que ser el mismo que la variable que recibe los datos de la bd
        return view("contacto", compact("datos_bd",'categorias')); 
    }

    function envio($dato){
        echo "ayuda ".$dato;
    }
}
