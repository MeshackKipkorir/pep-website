<?php

namespace App\Http\Controllers;

use App\Models\KiaguMobilizers;
use App\Models\KiaguPollingStations;
use App\Models\KiaguRegisteredVoters;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentsController extends Controller
{
    //add mobilizers
    public function addMobilizer(){

        $polling_station = Auth::user()->polling_center;
        $agent = Auth::user()->agent_type;

        $polling_stations = KiaguPollingStations::all();
        return view('mobilizers.add_mobilizer',['polling_stations' => $polling_stations,'agent' => $agent,'polling_station'=>$polling_station]);
    }

    public function addMobilizerB(){

        $polling_stations = KiaguPollingStations::all();
        return view('mobilizers.add_mobilizer_b',['polling_stations' => $polling_stations]);
    }

    //fetch mobilizer
    public function fetchMobilizer($polling_center,$id){

        return KiaguRegisteredVoters::where('id_no',$id)->where('polling_center', $polling_center)->first();
    }

    public function saveMobilizer(Request $request){

        //save or update
        $id = $request->id_no;

        if(KiaguMobilizers::where('id_no', $id)->exists()){

            return response()->json([
                'message' => 'Mobilizer already exists'
            ]);
        }

        else{

            $data = $request->except(['_token']);
            $data['calling_agent'] = Auth::user()->name;

            KiaguMobilizers::create($data);

            return response()->json([
                'message' => 200
            ]);
        }

    }

    public function agentsReport(){

        $agents = User::all();

        return view('mobilizers.agents_report', ['agents' => $agents]);
    }
}
