<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallNumbersController extends Controller
{
    public function callOneNumber(Request $request){
        $numbers = rand(1,75);
        return view('numbers',compact('numbers'));
    }

    public function callAllNumbers(Request $request){
        $random = range(1, 75);
        shuffle($random);
        return view('numbers',compact('random'));
    }
}
