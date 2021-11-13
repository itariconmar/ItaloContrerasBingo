<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckCardsController extends Controller
{
    function toGame(){

        $random = range(1, 75);
        shuffle($random);

        return view('game', compact('random'));
    }

    function toCheck(Request $request){

        $respuesta = '';

        $inputs = $request->all();

        $callNumbers = $inputs['callNumbers'];
        $cardNumbers = $inputs['cardNumbers'];

        $callNumbers = explode(',', $callNumbers);
        $cardNumbers = explode(',', $cardNumbers);

        //Validar números
        if(count($cardNumbers) < 14){
            $respuesta = 'Tu cartón no tiene la cantidad correcta de valores';

            return view('answer',compact('respuesta'));
        }

        if(count($cardNumbers) > 14){
            $respuesta = 'Tu cartón tiene más de la cantidad correcta de valores';

            return view('answer',compact('respuesta'));
        }

        if(count($cardNumbers) > count($callNumbers)){
            $respuesta = 'Aun no acaba el juego, paciencia';
        return view('answer',compact('respuesta'));
        }


        foreach ($callNumbers as $key => $value){

            if(!is_numeric($value) || $value>75 || $value<1){
            $respuesta = 'Parece que el cantante se ha equivocado, mil disculpas';
            return view('answer',compact('respuesta'));

            }

        }


        foreach ($cardNumbers as $key => $value){

            if(!is_numeric($value) || $value>75 || $value<1){
                $respuesta = 'Lo siento, tienes números que no son parte del juego.';
                return view('answer',compact('respuesta'));

            }

        }

        //validar victoria
        $interseccion = array_intersect_assoc($callNumbers,$cardNumbers);

        if(count($interseccion) == count($cardNumbers)){

            $respuesta = 'Ganaste';

            return view('answer',compact('respuesta'));
        }



    }
}
