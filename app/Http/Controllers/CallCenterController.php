<?php

namespace App\Http\Controllers;

use App\Models\PollFour;
use App\Models\PollOneResponse;
use App\Models\ResponseA;
use App\Models\ResponseB;
use App\Models\ResponseC;
use App\Models\TokenOneResponse;
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

    public function saveOpinionTwo(Request $request){

        $data = [
            'id_no' => $request->id_no,
            'phone_no' => $request->phone_no,
            'names' => $request->names,
            'polling_center' => $request->polling_center,
            'voting_status' => $request->voting_status,
            'calling_agent' => $request->calling_agent,
            'candidate' => $request->candidate,
            'candidate_second_time' => $request->candidate_second_time,
            'call_status' => $request->call_status
        ];

        PollFour::create($data);

        CallCenter::where('id_no', $request->id_no)->update(['called' => 1]);

        return back()->with('message','success');

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
        $total = DB::select("SELECT count(*) as total from response_a where call_status = 'picked'");

        $candidates_with_no_voters = DB::select("select id from lari_mp_candidates where id not in (SELECT candidate from response_a where call_status = 'picked' and candidate is not null)
");
        $agents_stats = DB::select("select count(*) as total,calling_agent  from response_a where call_status = 'picked'  GROUP BY calling_agent order by total desc");

        $total_agents = DB::select("select count(distinct calling_agent) as total from response_a ");

        $total_picked = ResponseA::where('call_status','picked')->count();

        $total_not_voting = DB::select("SELECT count(*) as total FROM response_a where voting_status = 0
");

        $agent_average =  $total_picked / $total_agents[0]->total;

        $invalid = DB::select("SELECT count(*) as total from response_a where call_status = 'picked' and candidate is null
");

        $data = [
            'results' => $results,
            'total' => $total,
            'total_calls' => ResponseA::count(),
            'total_picked' => ResponseA::where('call_status','picked')->count(),
            'total_missed' => ResponseA::where('call_status','missed')->count(),
            'total_invalid' => ResponseA::where('call_status','invalid')->count(),
            'agent_average' => $agent_average,
            'total_unreachable' => ResponseA::where('call_status','unreachable')->count(),
            'agents_stats' => $agents_stats,
            'invalid' => $invalid,
            'not_voting' => ResponseA::where('voting_status',0)->count()
        ];

        return view('call_center.report',$data);
    }

    public function callCenterReportTwo(){
        $results = DB::select("SELECT count(*) as total, (SELECT name from lari_mp_candidates where lari_mp_candidates.id = call_center_two.candidate) as candidate FROM `call_center_two` WHERE call_status = 'picked' and candidate is not null GROUP BY candidate order by total DESC
");
        $total = DB::select("SELECT count(*) as total from call_center_two where call_status = 'picked'");

        $candidates_with_no_voters = DB::select("select id,name from lari_mp_candidates where id not in (SELECT candidate from call_center_two where call_status = 'picked' and candidate is not null)
");
        $agents_stats = DB::select("select count(*) as total,calling_agent  from call_center_two where call_status = 'picked'  GROUP BY calling_agent order by total desc");

        $total_agents = DB::select("select count(distinct calling_agent) as total from call_center_two ");

        $total_picked = TokenOneResponse::where('call_status','picked')->count();

        $total_not_voting = DB::select("SELECT count(*) as total FROM call_center_two where voting_status = 0
");

        $agent_average =  $total_picked / $total_agents[0]->total;

        $total_token_received = DB::select("SELECT count(*) as total FROM `call_center_two` where call_status = 'picked' and received_token = 1
");
        $total_token_not_received = DB::select("SELECT count(*) as total FROM `call_center_two` where call_status = 'picked' and received_token = 0
");

        $invalid = DB::select("SELECT count(*) as total from call_center_two where call_status = 'picked' and candidate is null
");

        $polling_station_results = DB::select("select (SELECT name from lari_mp_candidates where lari_mp_candidates.id = call_center_two.candidate) as candidate, polling_center, count(*) as votes, (count(*) / (select count(candidate) from call_center_two)) * 100 as percentage from call_center_two where call_status='picked' GROUP BY candidate,polling_center order by votes desc");

        $polling_station_total = DB::select("select polling_center,count(*) as total from call_center_two where call_status = 'picked' GROUP BY polling_center
");

        $candidates = DB::select("select * from lari_mp_candidates");

        $polling_stations = DB::select("select distinct polling_station from kiagu_polling_stations");

        $data = [
            'polling_stations' => $polling_stations,
            'candidates' => $candidates,
            'polling_station_results' => $polling_station_results,
            'results' => $results,
            'total' => $total,
            'total_calls' => TokenOneResponse::count(),
            'total_picked' => TokenOneResponse::where('call_status','picked')->count(),
            'total_missed' => TokenOneResponse::where('call_status','missed')->count(),
            'total_invalid' => TokenOneResponse::where('call_status','invalid')->count(),
            'agent_average' => $agent_average,
            'total_unreachable' => TokenOneResponse::where('call_status','unreachable')->count(),
            'agents_stats' => $agents_stats,
            'invalid' => $invalid,
            'not_voting' => TokenOneResponse::where('voting_status',0)->count(),
            'non_voted_candidates' => $candidates_with_no_voters,
            'total_token_received' => $total_token_received,
            'total_token_not_received' => $total_token_not_received,
            'polling_station_total' => $polling_station_total
        ];

        return view('call_center.report_two',$data);
    }

    public function callCenterReportThree(){
        $results = DB::select("SELECT count(*) as total, (SELECT name from lari_mp_candidates where lari_mp_candidates.id = poll_one.candidate) as candidate FROM `poll_one` WHERE call_status = 'picked' and candidate is not null GROUP BY candidate order by total DESC
");
        $total = DB::select("SELECT count(*) as total from poll_one where call_status = 'picked'");

        $candidates_with_no_voters = DB::select("select id,name from lari_mp_candidates where id not in (SELECT candidate from poll_one where call_status = 'picked' and candidate is not null)
");
        $agents_stats = DB::select("select count(*) as total,calling_agent  from poll_one where call_status = 'picked'  GROUP BY calling_agent order by total desc");

        $total_agents = DB::select("select count(distinct calling_agent) as total from poll_one ");

        $total_picked = PollOneResponse::where('call_status','picked')->count();

        $total_not_voting = DB::select("SELECT count(*) as total FROM poll_one where voting_status = 0
");

        $agent_average =  $total_picked / $total_agents[0]->total;

        $total_token_received = DB::select("SELECT count(*) as total FROM `poll_one` where call_status = 'picked' and received_token = 1
");
        $total_token_not_received = DB::select("SELECT count(*) as total FROM `poll_one` where call_status = 'picked' and received_token = 0
");

        $invalid = DB::select("SELECT count(*) as total from poll_one where call_status = 'picked' and candidate is null
");

        $polling_station_results = DB::select("select (SELECT name from lari_mp_candidates where lari_mp_candidates.id = poll_one.candidate) as candidate, polling_center, count(*) as votes, (count(*) / (select count(candidate) from poll_one)) * 100 as percentage from poll_one where call_status='picked' GROUP BY candidate,polling_center order by votes desc");

        $polling_station_total = DB::select("select polling_center,count(*) as total from poll_one where call_status = 'picked' GROUP BY polling_center
");

        $candidates = DB::select("select * from lari_mp_candidates");

        $polling_stations = DB::select("select distinct polling_station from kiagu_polling_stations");

        $data = [
            'polling_stations' => $polling_stations,
            'candidates' => $candidates,
            'polling_station_results' => $polling_station_results,
            'results' => $results,
            'total' => $total,
            'total_calls' => PollOneResponse::count(),
            'total_picked' => PollOneResponse::where('call_status','picked')->count(),
            'total_missed' => PollOneResponse::where('call_status','missed')->count(),
            'total_invalid' => PollOneResponse::where('call_status','invalid')->count(),
            'agent_average' => $agent_average,
            'total_unreachable' => PollOneResponse::where('call_status','unreachable')->count(),
            'agents_stats' => $agents_stats,
            'invalid' => $invalid,
            'not_voting' => PollOneResponse::where('voting_status',0)->count(),
            'non_voted_candidates' => $candidates_with_no_voters,
            'total_token_received' => $total_token_received,
            'total_token_not_received' => $total_token_not_received,
            'polling_station_total' => $polling_station_total
        ];

        return view('call_center.report_three',$data);
    }

    public function callCenterReportFour(){
        $results = DB::select("SELECT count(*) as total, (SELECT name from lari_mp_candidates where lari_mp_candidates.id = poll_four.candidate) as candidate FROM `poll_four` WHERE call_status = 'picked' and candidate is not null GROUP BY candidate order by total DESC
");

        $results_two = DB::select("SELECT count(*) as total, (SELECT name from lari_mp_candidates where lari_mp_candidates.id = poll_four.candidate_second_time) as candidate FROM `poll_four` WHERE call_status = 'picked' and candidate_second_time is not null GROUP BY candidate_second_time order by total DESC
");

        $total = DB::select("SELECT count(*) as total from poll_four where call_status = 'picked'");
        $total_two = DB::select("SELECT count(candidate_second_time) as total from poll_four where call_status = 'picked'");


        $candidates_with_no_voters = DB::select("select id,name from lari_mp_candidates where id not in (SELECT candidate from poll_four where call_status = 'picked' and candidate is not null)
");
        $agents_stats = DB::select("select count(*) as total,calling_agent  from poll_four where call_status = 'picked'  GROUP BY calling_agent order by total desc");

        $total_agents = DB::select("select count(distinct calling_agent) as total from poll_four ");

        $total_picked = PollFour::where('call_status','picked')->count();

        $total_not_voting = DB::select("SELECT count(*) as total FROM poll_four where voting_status = 0
");

        $agent_average =  $total_picked / $total_agents[0]->total;


        $invalid = DB::select("SELECT count(*) as total from poll_four where call_status = 'picked' and candidate is null
");

        $polling_station_results = DB::select("select (SELECT name from lari_mp_candidates where lari_mp_candidates.id = poll_four.candidate) as candidate, polling_center, count(*) as votes, (count(*) / (select count(candidate) from poll_four)) * 100 as percentage from poll_four where call_status='picked' GROUP BY candidate,polling_center order by votes desc");

        $polling_station_total = DB::select("select polling_center,count(*) as total from poll_four where call_status = 'picked' GROUP BY polling_center
");

        $candidates = DB::select("select * from lari_mp_candidates");

        $polling_stations = DB::select("select distinct polling_station from kiagu_polling_stations");

        $data = [
            'polling_stations' => $polling_stations,
            'candidates' => $candidates,
            'polling_station_results' => $polling_station_results,
            'results' => $results,
            'results' => $results,
            'results_two' => $results_two,
            'total' => $total,
            'total_two' => $total_two,
            'total_calls' => PollFour::count(),
            'total_picked' => PollFour::where('call_status','picked')->count(),
            'total_missed' => PollFour::where('call_status','missed')->count(),
            'total_invalid' => PollFour::where('call_status','invalid')->count(),
            'agent_average' => $agent_average,
            'total_unreachable' => PollFour::where('call_status','unreachable')->count(),
            'agents_stats' => $agents_stats,
            'invalid' => $invalid,
            'not_voting' => PollFour::where('voting_status',0)->count(),
            'non_voted_candidates' => $candidates_with_no_voters,
            'polling_station_total' => $polling_station_total
        ];

        return view('call_center.report_four',$data);
    }
}
