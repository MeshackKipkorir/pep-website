<?php

namespace App\Http\Controllers;

use App\Models\ResponseA;
use App\Models\ResponseB;
use App\Models\ResponseC;
use Illuminate\Support\Facades\Auth;
use App\Models\CallCenter;
use App\Models\KiaguCandidates;
use App\Models\KiaguPollingStations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Prophecy\Call\Call;

class CallCenterController extends Controller
{
    //
    public function index(){

        $polling_stations = KiaguPollingStations::all();

        $data = [
            'polling_stations' => $polling_stations,
            'candidates' => KiaguCandidates::all(),
            'agent' => Auth::user()->name,
            'user' => $this->fetchUser(),
        ];
        return view('call_center.index',$data);
    }

    public function saveOpinion(Request $request){

        $response_a = [
            'id_no' => $request->id_no,
            'phone_no' => $request->phone_no,
            'names' => $request->names,
            'call_status' => $request->call_status,
            'calling_agent' => Auth::user()->name,
            'polling_center' => $request->polling_center,
            'voting_status' => $request->voting_status,
            'candidate' => $request->candidate,
            'voting_reason' => $request->voting_reason
        ];

        $response_b = [
            'id_no' => $request-> id_no,
            'phone_no' => $request-> phone_no,
            'names' => $request-> names,
            'polling_center' => $request-> polling_center,
            'received_token' => $request-> received_token,
            'received_token_from' => $request-> received_token_from,
            'received_token_amount' => $request-> received_token_amount,
            'party' => $request-> party,
            'party_symbol' => $request-> party_symbol,
            'party_slogan' => $request-> party_slogan,
            'official_name' => $request-> official_name,
            'be_our_agent' => $request-> be_our_agent,
            'advanced_payment' => $request-> advanced_payment,
            'vote_for_kabobo' => $request-> vote_for_kabobo,
            'mobilize' => $request-> mobilize
        ];

        $response_c = [
            'id_no' => $request-> id_no,
            'phone_no' => $request-> phone_no,
            'names' => $request-> names,
            'polling_center' => $request-> polling_center,
            'confirm_receive_token' => $request->confirm_receive_token,
            'vote_for_kabobo' => $request->vote_for_kabobo,
            'will_mobilize' => $request->will_mobilize,
        ];

        //save response A
        ResponseA::updateOrCreate(['id_no' => $request->id_no],$response_a);

        //save question B
        ResponseB::updateOrCreate(['id_no' => $request->id_no],$response_b);

        //save question C
        ResponseC::updateOrCreate(['id_no' => $request->id_no],$response_c);

        CallCenter::where('id_no', $request->id_no)->update(['called' => 1]);

        return back()->with('message','success');
    }

    /**
     * This function checks if a voter is booked, then assigns them an agent
     */

    public function fetchUser(){

        if((CallCenter::where('booked_by',Auth::user()->name)->where('called',0)->exists())){
            $id = CallCenter::where('booked', 1)->where('booked_by',Auth::user()->name)->where('called',0)->min('id');

            //set this user as booked
            //check if user is booked

            //set id as booked
            return CallCenter::where('id', $id)->where('booked_by', Auth::user()->name)->first();
        }
        else{
            $id = CallCenter::where('booked', 0)->where('phone_number','!=',0)->min('id');

            CallCenter::where('id', $id)->update(['booked'=>1]);
            //set booked_by
            CallCenter::where('id', $id)->update(['booked_by'=>Auth::user()->name]);

            //set id as booked
            return CallCenter::where('id', $id)->where('booked_by', Auth::user()->name)->first();

        }
    }

    //call center report
    public function callCenterReport(){

        $results = DB::select("SELECT count(*) as total, (SELECT name from lari_mp_candidates where lari_mp_candidates.id = response_a.candidate) as candidate FROM `response_a` WHERE call_status = 'picked' and candidate is not null GROUP BY candidate order by total DESC
");
        $total = DB::select("SELECT count(*) as total from response_a where call_status = 'picked' and candidate is not null");

        $candidates_with_no_voters = DB::select("select id from lari_mp_candidates where id not in (SELECT candidate from response_a where call_status = 'picked' and candidate is not null)
");
        $data = [
            'results' => $results,
            'total' => $total,
            'total_calls' => ResponseA::count(),
            'total_picked' => ResponseA::where('call_status','picked')->count(),
            'total_missed' => ResponseA::where('call_status','missed')->count(),
            'total_invalid' => ResponseA::where('call_status','invalid')->count(),
            'total_unreachable' => ResponseA::where('call_status','unreachable')->count()
        ];

        return view('call_center.report',$data);
    }

}
