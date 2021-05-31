<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirant;

class MainController extends Controller
{
    //

    public function index(){

        return view('aspirant_registration');
    }

    public function store(Request $request){

        $data = $request->all();
        Aspirant::create($data);

        return response()->json([
            'message' => 'success'
        ]);
    }   
}
