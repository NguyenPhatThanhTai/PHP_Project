<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function testControllerGet (Request $request){
        $result = DB::select('select * from datatest');
        DB::insert('insert into datatest (Id, Name, Note) values (?, ?, ?)', array(date("s"), 'Dayle', 'test'));

        $testInArray = [(object) ["Detail" => "ok"], (object) ["Detail" => "ok"], (object) ["Detail" => "ok"], (object) ["Detail" => "ok"] ,(object) ["Detail" => "ok"]];
        $test = (object) ["Key" => $request->get('id'), "Value" => $result];
        $testArray = [];

        $testArray[] = $test;
        // $testArray[] = $test;
        // $testArray[] = $test;
        // $testArray[] = $test;
        // $testArray[] = $test;

        return view('page1') -> with('testArray', $testArray);
    }

    public function testControllerPost (Request $request){
        $testInArray = [(object) ["Detail" => "ok"], (object) ["Detail" => "ok"], (object) ["Detail" => "ok"], (object) ["Detail" => "ok"] ,(object) ["Detail" => "ok"]];
        $test = (object) ["Key" => $request->post('id'), "Value" => $testInArray];
        $testArray = [];

        $testArray[] = $test;
        $testArray[] = $test;
        $testArray[] = $test;
        $testArray[] = $test;
        $testArray[] = $test;

        return view('page1') -> with('testArray', $testArray);
    }
}
