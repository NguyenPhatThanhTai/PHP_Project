<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function testControllerGet (Request $request){
        $test = (object) ["Key" => $request->get('id'), "Value" => "test"];
        $testArray = [];

        $testArray[] = $test;
        $testArray[] = $test;
        $testArray[] = $test;
        $testArray[] = $test;
        $testArray[] = $test;

        return view('page1') -> with('testArray', $testArray);
    }

    public function testControllerPost (Request $request){
        $test = (object) ["Key" => $request->post('id'), "Value" => "test"];
        $testArray = [];

        $testArray[] = $test;
        $testArray[] = $test;
        $testArray[] = $test;
        $testArray[] = $test;
        $testArray[] = $test;

        return view('page1') -> with('testArray', $testArray);
    }
}
