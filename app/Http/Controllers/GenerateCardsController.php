<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenerateCardsController extends Controller
{
    public function generateCard(){

        $limits =[
                'B' =>[1,15],
                'I' =>[16,31],
                'N' =>[31,45],
                'G' =>[46,60],
                'O' =>[61,75],
            ];

        $card = [
          'B' =>range($limits['B'][0],$limits['B'][1]),
          'I' =>range($limits['I'][0],$limits['I'][1]),
          'N' =>range($limits['N'][0],$limits['N'][1]),
          'G' =>range($limits['G'][0],$limits['G'][1]),
          'O' =>range($limits['O'][0],$limits['O'][1]),
        ];

        foreach ($card as $key => $value){
            shuffle($card[$key]);
         }

        $card['N'][2] = '';

        return view('card',compact('card'));

    }
}
