<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirant;
use App\Models\Members;
use App\Models\PartyMembers;


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
            'message' => 200
        ]);
    }   

    public function memberRegistration(){

        return view('member_registration');
    }

    public function fetchMember($id){

        return Members::where('id_no', $id)->get();
    }

    public function saveMember(Request $request){

        $data = $request->all();
        PartyMembers::create($data);

        return response()->json([
            'message' => 200
        ]);
    }  
}
