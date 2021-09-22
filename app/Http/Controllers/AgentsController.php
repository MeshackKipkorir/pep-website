<?php

namespace App\Http\Controllers;

use App\Models\KiaguMobilizers;
use App\Models\KiaguPollingStations;
use App\Models\KiaguRegisteredVoters;
use App\Models\Materials;
use App\Models\NoPhone;
use App\Models\SuperMobilizer;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;


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

    public function checkPhoneNumber($phone_number){

        if(Token::where('mobile_no',$phone_number)->exists()){
            return response()->json([
                'response' => 'phone number already awarded token'
            ]);
        }
        else{
            return response()->json([
                'response' => 'ok'
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

    public function searchMobilizer($id, $polling_station){

       // dd($id);
        if(KiaguRegisteredVoters::where('id_no',$id)->exists()){
            $phone_no_main = KiaguRegisteredVoters::where('id_no',$id)->value('phone_number');
            $secondary_phone = Materials::where('id_no',$id)->value('mobile_no');
        }
        else{
            return response()->json([
                'message' => 'Not a registered Voter in Kiagu Ward'
            ]);
        }
        //dd(count($phone_no_main));

        if(Token::where('id_no', $id)->exists() || Token::where('mobile_no',$phone_no_main)->exists() || Token::where('mobile_no',$secondary_phone)->exists() ){

            return response()->json([
                'message' => 'Mobilizer already allocated token'
            ]);
        }
        else{

            if(KiaguRegisteredVoters::where('id_no', $id)->where('polling_center', $polling_station)->exists()){

                return response()->json([
                    'message' => KiaguRegisteredVoters::where('id_no', $id)->where('polling_center', $polling_station)->get()
                ]);
            }
            else if(Materials::where('id_no', $id)->where('polling_station', $polling_station)->exists()){
                return response()->json([
                    'message' => Materials::where('id_no', $id)->where('polling_station', $polling_station)->get()
                ]);
            }
            else{
                return response()->json([
                    'message' => 'Not a registered Voter in Kiagu Ward'
                ]);
            }
        }
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

    public function saveMaterials(Request $request){


        Materials::updateOrCreate([
            'id_no' => $request->id_no
        ],$request->all());
    }

    public function materialsReport(){

        $t_shirts = DB::select('SELECT polling_station,count(*) as total,
       (SELECT no_of_voters FROM kiagu_polling_stations where polling_station = materials.polling_station) as no_of_voters,
       (SELECT count(t_shirt) FROM materials where t_shirt = 1 ) as total_t_shirts,
       (SELECT count(requested) FROM materials where requested = 1 and t_shirt = 1) as total_requested,
       (SELECT count(sent) FROM materials where sent = 1 and t_shirt = 1) as total_sent,
       (SELECT count(issued) FROM materials where issued = 1 and t_shirt = 1) as total_issued,
       (SELECT manager FROM kiagu_polling_stations where polling_station = materials.polling_station) as manager
       from materials GROUP BY polling_station order by total desc');

        $polling_centers = DB::select('select * from kiagu_polling_stations');



        $total_requested_ts = DB::select('select polling_station, count(requested) as total_requested from materials where requested = 1 and t_shirt = 1 GROUP BY polling_station ORDER BY total_requested DESC');

        $total_sent_ts = DB::select('select polling_station, count(IFNULL(sent, 0)=0)  as total_sent from materials where sent = 1 and t_shirt = 1 GROUP BY polling_station');

        $total_issued_ts = DB::select('select polling_station, count(IFNULL(issued, 0)=0)  as total_issued from materials where issued = 1 and t_shirt = 1 GROUP BY polling_station');

        $lesos = DB::select('SELECT polling_station,count(*) as total, (SELECT no_of_voters FROM kiagu_polling_stations where polling_station = materials.polling_station) as no_of_voters, (SELECT count(leso) FROM materials where leso = 1 ) as total_lesos, (SELECT count(requested) FROM materials where requested = 1 and leso = 1) as total_requested, (SELECT count(sent) FROM materials where sent = 1 and leso = 1) as total_sent, (SELECT count(issued) FROM materials where issued = 1 and leso = 1) as total_issued, (SELECT manager FROM kiagu_polling_stations where polling_station = materials.polling_station) as manager from materials where leso = 1 GROUP BY polling_station order by total desc');

        $total_requested_ls = DB::select('select polling_station, count(requested) as total_requested from materials where requested = 1 and leso = 1 GROUP BY polling_station');

        $total_requested_ova = DB::select('select polling_station, count(requested) as total_requested from materials where requested = 1 and overall = 1 GROUP BY polling_station');


        $total_sent_ls = DB::select('select polling_station, count(IFNULL(sent, 0)=0)  as total_sent from materials where sent = 1 and leso = 1 GROUP BY polling_station');

        $total_issued_ls = DB::select('select polling_station, count(IFNULL(issued, 0)=0)  as total_issued from materials where issued = 1 and leso = 1 GROUP BY polling_station');

        $aprons = DB::select('SELECT polling_station,count(*) as total, (SELECT no_of_voters FROM kiagu_polling_stations where polling_station = materials.polling_station) as no_of_voters, (SELECT count(apron) FROM materials where apron = 1 ) as total_apron, (SELECT count(requested) FROM materials where requested = 1 and apron = 1) as total_requested, (SELECT count(sent) FROM materials where sent = 1 and apron = 1) as total_sent, (SELECT count(issued) FROM materials where issued = 1 and apron = 1) as total_issued, (SELECT manager FROM kiagu_polling_stations where polling_station = materials.polling_station) as manager from materials where apron = 1 GROUP BY polling_station order by total desc');

        $total_requested_ap = DB::select('select polling_station, count(requested) as total_requested from materials where requested = 1 and apron = 1 GROUP BY polling_station');

        $total_sent_ap = DB::select('select polling_station, count(IFNULL(sent, 0)=0)  as total_sent from materials where sent = 1 and apron = 1 GROUP BY polling_station');

        $total_issued_ap = DB::select('select polling_station, count(IFNULL(issued, 0)=0)  as total_issued from materials where issued = 1 and apron = 1 GROUP BY polling_station');

        $dormant_t_shirt = DB::select('SELECT polling_station,manager,no_of_voters FROM kiagu_polling_stations WHERE NOT EXISTS (SELECT * FROM materials WHERE materials.polling_station = kiagu_polling_stations.polling_station and t_shirt = 1)');

        $dormant_leso = DB::select('SELECT polling_station,manager,no_of_voters FROM kiagu_polling_stations WHERE NOT EXISTS (SELECT * FROM materials WHERE materials.polling_station = kiagu_polling_stations.polling_station and leso = 1)');

        $dormant_apron = DB::select('SELECT polling_station,manager,no_of_voters FROM kiagu_polling_stations WHERE NOT EXISTS (SELECT * FROM materials WHERE materials.polling_station = kiagu_polling_stations.polling_station and apron = 1)');

        $total_t_shirts = DB::select('SELECT count(*) as total from materials where t_shirt = 1 and requested = 1  ');
        $total_ts = DB::select('SELECT polling_station,count(*) as total FROM `materials` GROUP BY polling_station order by total asc');
        $total_lesos = DB::select('SELECT count(*) as total from materials where leso = 1 and requested = 1  ');
        $total_aprons = DB::select('SELECT count(*) as total from materials where apron = 1 and requested = 1  ');
        $total_overall = DB::select('SELECT count(*) as total from materials where overall = 1 and requested = 1  ');
        $total_voters = DB::select('SELECT count(*) as total from kiagu_registered_voters');
        $t = DB::select('SELECT count(*) as total from materials');


        $data = [
            't_shirts' => $t_shirts,
            'total_sent_ts' => $total_sent_ts,
            'total_requested_ts' => $total_requested_ts,
            'total_issued_ts' => $total_issued_ts,
            'polling_centers' => $polling_centers,
            'lesos' => $lesos,
            'total_requested_ls' => $total_requested_ls,
            'total_sent_ls' => $total_sent_ls,
            'total_issued_ls' => $total_issued_ls,
            'aprons' => $aprons,
            'total_requested_ap' => $total_requested_ap,
            'total_requested_overall' => $total_requested_ova,
            'total_sent_ap' => $total_sent_ap,
            'total_issued_ap' => $total_issued_ap,
            'dormant_t_shirts' => $dormant_t_shirt,
            'dormant_lesos' => $dormant_leso,
            'dormant_aprons' => $dormant_apron,
            'total_ts' => $total_t_shirts,
            'total_ls' => $total_lesos,
            'total_ap' => $total_aprons,
            'total_ov' => $total_overall,
            'total_voters' => $total_voters,
            'total_ts_pc' => $total_ts,
            't' => $t,
        ];

        return view('campaign.materials_report',$data);

    }

    public function materialsManagerNoPhone(){

        $polling_station = KiaguPollingStations::all();

        return view('campaign.no_phone',['polling_stations' => $polling_station]);
    }

    public function saveMaterialsManagerNoPhone(Request $request){

        if(Materials::where('id_no',$request->id_no)->exists()){

            return response()->json([
                'message' => 'Already assigned an item'
            ]);
        }
        if(KiaguRegisteredVoters::where('id_no',$request->id_no)->where('polling_center',$request->polling_station)->exists()){

            NoPhone::updateOrCreate([
                'id_no' => $request->id_no
            ],$request->all());
        }

    }

    public  function recruitedWithoutPhone(){

        $data = [
          'mobilizers' => NoPhone::all()
        ];

        return view('campaign.recruited_without_phone', $data);
    }

    public function notRecruitedWithPhone(){

        $mobilizers = DB::select('SELECT * from kiagu_registered_voters where phone_number != "-" and id_no in (SELECT id_no from kiagu_registered_voters where id_no not in (SELECT id_no from materials))
');
        $polling_centers = KiaguPollingStations::all();

        $totals_per_polling_center = DB::select('SELECT count(*) as total,polling_center from kiagu_registered_voters where phone_number != "-" and id_no in (SELECT id_no from kiagu_registered_voters where id_no not in (SELECT id_no from materials)) GROUP BY polling_center');


        $data = [
            'mobilizers' => $mobilizers,
            'polling_centers' => $polling_centers,
            'totals' => $totals_per_polling_center
        ];

        return view('campaign.not_recruited_with_phone',$data);
    }

    public function notRecruitedWithoutPhone(){

        $mobilizers = DB::select('SELECT * from kiagu_registered_voters where phone_number = "-" and id_no in (SELECT id_no from kiagu_registered_voters where id_no not in (SELECT id_no from materials))
');
        $polling_centers = KiaguPollingStations::all();

        $totals_per_polling_center = DB::select('SELECT count(*) as total,polling_center from kiagu_registered_voters where phone_number = "-" and id_no in (SELECT id_no from kiagu_registered_voters where id_no not in (SELECT id_no from materials)) GROUP BY polling_center');

        $data = [
            'mobilizers' => $mobilizers,
            'polling_centers' => $polling_centers,
            'totals' => $totals_per_polling_center
        ];

        return view('campaign.not_recruited_without_phone',$data);
    }

    public function token(){

        return view('campaign.token_one',['polling_stations' => KiaguPollingStations::all()]);
    }

 /**
  * Save tokens
  */
 public function saveToken(Request $request){

     KiaguRegisteredVoters::where('id_no',$request->id_no)->update(['phone_number' => $request->mobile_no]);

     Token::updateOrCreate([
         'id_no' => $request->id_no
     ],$request->all());
 }

 public function tokenOneReport(){

     $polling_centers = DB::select('SELECT polling_station,count(*) as total, (SELECT no_of_voters FROM kiagu_polling_stations where polling_station = token_one.polling_station) as no_of_voters, (SELECT manager FROM kiagu_polling_stations where polling_station = token_one.polling_station) as manager from token_one GROUP BY polling_station order by total desc');
     $total_with_phone = DB::select('select polling_station,count(*) as total from token_one where mobile_no is not null GROUP BY polling_station ORDER BY total desc');
     $total_without_phone = DB::select('select polling_station,count(*) as total from token_one where mobile_no IS NULL GROUP BY polling_station ORDER BY total desc');
     $inactive = DB::select('SELECT polling_station,manager,no_of_voters FROM kiagu_polling_stations WHERE NOT EXISTS (SELECT * FROM token_one WHERE token_one.polling_station = kiagu_polling_stations.polling_station)');
     $totalwp = DB::select('SELECT count(*) as total from token_one where mobile_no is not null');
     $totalwnp = DB::select('SELECT count(*) as total from token_one where mobile_no is null');

     $data = [
         'polling_centers' => $polling_centers,
         'total_with_phone' => $total_with_phone,
         'total_without_phone' => $total_without_phone,
         'inactive_stations' => $inactive,
         'total_wp' => $totalwp,
         'total_wnp' => $totalwnp
     ];

     return view('campaign.token_one_report',$data);
 }

}
