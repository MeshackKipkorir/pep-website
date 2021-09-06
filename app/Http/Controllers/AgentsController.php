<?php

namespace App\Http\Controllers;

use App\Models\KiaguMobilizers;
use App\Models\KiaguPollingStations;
use App\Models\KiaguRegisteredVoters;
use App\Models\SuperMobilizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgentsController extends Controller
{
    //add mobilizers
    public function addMobilizer()
    {


        $polling_station = Auth::user()->polling_center;
        $agent = Auth::user()->agent_type;

        $polling_stations = KiaguPollingStations::all();
        return view('mobilizers.add_mobilizer', ['polling_stations' => $polling_stations, 'agent' => $agent, 'polling_station' => $polling_station]);
    }

    public function addMobilizerB()
    {

        $polling_stations = KiaguPollingStations::all();
        return view('mobilizers.add_mobilizer_b', ['polling_stations' => $polling_stations]);
    }

    //fetch mobilizer
    public function fetchMobilizer($polling_center, $id)
    {

        return KiaguRegisteredVoters::where('id_no', $id)->where('polling_center', $polling_center)->get();
    }

    public function saveMobilizer(Request $request)
    {

        //save or update
        $id = $request->id_no;


        if (KiaguMobilizers::where('id_no', $id)->exists()) {

            $data = $request->except(['_token']);

            DB::table('kiagu_mobilizers')->where('id_no', $id)->update($data);
            return response()->json([
                'message' => 'Mobilizer already exists'
            ]);
        } else {

            $data = $request->except(['_token']);
            $data['calling_agent'] = Auth::user()->name;

            KiaguMobilizers::create($data);

            return response()->json([
                'message' => 200
            ]);
        }

    }

    public function agentsReport()
    {

        $agents = User::all();

        return view('mobilizers.agents_report', ['agents' => $agents]);
    }

    //mobilizers report
    public function mobilizersReport()
    {

        $polling_centers = DB::select('select distinct polling_station from kiagu_mobilizers');

        $picked = DB::select("select polling_station, count(IFNULL(call_status, 0)=0) as picked from kiagu_mobilizers where call_status = 'picked' GROUP BY polling_station");
        $missed = DB::select("select polling_station, count(IFNULL(call_status, 0)=0) as missed from kiagu_mobilizers where call_status = 'missed' GROUP BY polling_station");
        $invalid = DB::select("select polling_station, count(IFNULL(call_status, 0)=0) as invalid from kiagu_mobilizers where call_status = 'invalid' GROUP BY polling_station");

        $domarnt_polling_center = DB::select("
        SELECT polling_station,manager,no_of_voters FROM kiagu_polling_stations WHERE NOT EXISTS (SELECT * FROM kiagu_mobilizers WHERE kiagu_mobilizers.polling_station = kiagu_polling_stations.polling_station);
             ");

        //dd($domarnt_polling_center);

        $mobilizers = DB::select("SELECT polling_station,count(*) as total,
       (SELECT no_of_voters FROM kiagu_polling_stations where polling_station = kiagu_mobilizers.polling_station) as no_of_voters,
       (SELECT SUM(no_of_voters) FROM kiagu_polling_stations ) as total_voters,
       (SELECT count(*) FROM kiagu_mobilizers where recruitment_status = 'recruited') as total_recruited,
       (SELECT manager FROM kiagu_polling_stations where polling_station = kiagu_mobilizers.polling_station) as manager
       from kiagu_mobilizers where recruitment_status = 'recruited' GROUP BY polling_station order by total desc;");

        $calls = DB::select("SELECT polling_station, (select count(call_status) from kiagu_mobilizers where call_status = 'picked' ) as picked, (select count(call_status) from kiagu_mobilizers where call_status = 'missed' ) as missed, (select count(call_status) from kiagu_mobilizers where call_status = 'invalid' ) as invalid from kiagu_mobilizers GROUP BY polling_station;");

        $data = [
            'polling_centers' => $polling_centers,
            'mobilizers' => $mobilizers,
            'calls' => $calls,
            'picked' => $picked,
            'missed' => $missed,
            'invalid' => $invalid,
            'domarnt_polling_center' => $domarnt_polling_center
        ];

        return view('mobilizers.mobilizers_report', $data);
    }

    public function superMobilizers(){
        $polling_stations = KiaguPollingStations::all();

        return view('mobilizers.add_super_mobilizers', ['polling_stations' => $polling_stations]);
    }

    public function checkMobilizer($polling_center, $id){

        if(KiaguMobilizers::where('polling_station',$polling_center)->where('id_no', $id)->exists()){

            return response()->json([
                'response' => 'mobilizer exists'
            ]);
        }

        else{

            return response()->json([
                'response' => 'mobilizer does not exists'
            ]);
        }
    }

    public function saveSuperMobilizer(Request $request){

        $id = $request->id_no;


        if (SuperMobilizer::where('id_no', $id)->exists()) {

            $data = $request->except(['_token']);

            DB::table('super_mobilizer')->where('id_no', $id)->update($data);
            return response()->json([
                'message' => 'Mobilizer already exists'
            ]);
        } else {

            $data = $request->except(['_token']);

            SuperMobilizer::create($data);

            return response()->json([
                'message' => 200
            ]);
        }
    }

    public function searchMobilizer($id){

       // dd($id);

        $result =  DB::select("
           SELECT * FROM `kiagu_registered_voters` where id_no = $id
        ");

        return $result;
    }

    public function mobilizersFinalReport(){


        $polling_centers = DB::select('select distinct polling_station from kiagu_mobilizers');

        $picked = DB::select("select polling_station, count(IFNULL(call_status, 0)=0) as picked from kiagu_mobilizers where call_status = 'picked' GROUP BY polling_station");
        $missed = DB::select("select polling_station, count(IFNULL(call_status, 0)=0) as missed from kiagu_mobilizers where call_status = 'missed' GROUP BY polling_station");
        $invalid = DB::select("select polling_station, count(IFNULL(call_status, 0)=0) as invalid from kiagu_mobilizers where call_status = 'invalid' GROUP BY polling_station");

        $domarnt_polling_center = DB::select("
        SELECT polling_station,manager,no_of_voters FROM kiagu_polling_stations WHERE NOT EXISTS (SELECT * FROM kiagu_mobilizers WHERE kiagu_mobilizers.polling_station = kiagu_polling_stations.polling_station);
             ");

        //dd($domarnt_polling_center);

        $mobilizers = DB::select("
        SELECT polling_station,count(*) as total,
       (SELECT no_of_voters FROM kiagu_polling_stations where polling_station = super_mobilizer.polling_station) as no_of_voters,
       (SELECT SUM(no_of_voters) FROM kiagu_polling_stations ) as total_voters,
       (SELECT count(*) FROM super_mobilizer) as total_recruited,
       (SELECT manager FROM kiagu_polling_stations where polling_station = super_mobilizer.polling_station) as manager,
       (SELECT ass_manager FROM kiagu_polling_stations where polling_station = super_mobilizer.polling_station) as ass_manager,
       (SELECT local_coordinator FROM kiagu_polling_stations where polling_station = super_mobilizer.polling_station) as local_coordinator,
       (SELECT ass_local_coordinator FROM kiagu_polling_stations where polling_station = super_mobilizer.polling_station) as ass_local_coordinator
       from super_mobilizer GROUP BY polling_station order by total desc;
        ");

        $calls = DB::select("SELECT polling_station, (select count(call_status) from kiagu_mobilizers where call_status = 'picked' ) as picked, (select count(call_status) from kiagu_mobilizers where call_status = 'missed' ) as missed, (select count(call_status) from kiagu_mobilizers where call_status = 'invalid' ) as invalid from kiagu_mobilizers GROUP BY polling_station;");

        $data = [
            'polling_centers' => $polling_centers,
            'mobilizers' => $mobilizers,
            'calls' => $calls,
            'picked' => $picked,
            'missed' => $missed,
            'invalid' => $invalid,
            'domarnt_polling_center' => $domarnt_polling_center
        ];

        return view('mobilizers.mobilizers_final_report', $data);

    }

    public function materialsManager(){

        $polling_stations = KiaguPollingStations::all();

        $data = [
            'polling_stations' => $polling_stations
        ];

        return view('campaign.materials', $data);
    }
}
