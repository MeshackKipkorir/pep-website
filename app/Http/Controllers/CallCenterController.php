<?php

namespace App\Http\Controllers;

use App\Models\FebPolls;
use App\Models\JulyPolls;
use App\Models\MahooCandidates;
use App\Models\MahooResponse;
use App\Models\KiaguSeventhPoll;
use App\Models\MarchPolls;
use App\Models\Pledge;
use App\Models\PledgesReport;
use App\Models\PollFive;
use App\Models\PollFour;
use App\Models\PollOneResponse;
use App\Models\Reasons;
use App\Models\ResponseA;
use App\Models\ResponseB;
use App\Models\ResponseC;
use App\Models\TokenOneResponse;
use App\Models\User;
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

        $user = $this->fetchUser();

        $data = [
            'polling_stations' => $polling_stations,
            'candidates' => KiaguCandidates::all(),
            'agent' => Auth::user()->name,
            'user' => $user,
            'reasons' => Reasons::all()
        ];
        return view('call_center.index',$data);
    }

    public function pledges(){

        $polling_stations = KiaguPollingStations::all();

        $user = $this->fetchPledgeUser();

        //dd($user);

        $data = [
            'polling_stations' => $polling_stations,
            'candidates' => KiaguCandidates::all(),
            'agent' => Auth::user()->name,
            'user' => $user,
            'reasons' => Reasons::all()
        ];
        return view('call_center.pledge',$data);
    }

    public function fetchPledgeUser(){

        if((Pledge::where('booked_by',Auth::user()->name)->where('called',0)->exists())){
            $id = Pledge::where('booked', 1)->where('booked_by',Auth::user()->name)->where('called',0)->min('id');

            //set this user as booked
            //check if user is booked

            //set id as booked
            return Pledge::where('id', $id)->where('booked_by', Auth::user()->name)->first();
        }
        else{

            $id = Pledge::where('booked', 0)->where('phone_number','!=',0)->inRandomOrder()
                ->limit(1) // here is your limit
                ->pluck('id');


            $ward = Auth::user()->ward;

            //$id = DB::select("select id from muranga_registered_voters where booked = 0 and phone_number != 0 and polling_center not in(select distinct polling_center from kiagu_seventh_poll_results) order by RAND() limit 1");

            $phone_no = Pledge::where('id',$id)->pluck('phone_number');

            if(!PledgesReport::where('phone_number', $phone_no[0])->exists()){

                Pledge::where('id', $id)->update(['booked'=>1]);
                //set booked_by
                Pledge::where('id', $id)->update(['booked_by'=>Auth::user()->name]);


                //set id as booked

                return Pledge::where('id', $id)->where('booked_by', Auth::user()->name)->first();
            }
            else{

                //repeat until a user is found
                $this->fetchPledgeUser();
            }
        }

    }

    public function savePledge(Request $request){


        //update or create
        PledgesReport::updateOrCreate(
            [
            'phone_number' => $request->phone_no
            ],
            [
                'calling_agent' => $request->calling_agent,
                'names' => $request->names,
                'constituency' => $request->constituency,
                'call_status' => $request->call_status,
                'response' => $request->candidate
            ]
        );

        //update call center set called to 1
        Pledge::where('phone_number', $request->phone_no)->update(['called' => 1]);

        return back()->with('message','Opinion Saved Successfully');
    }

    public function saveOpinionTwo(Request $request){

        $data = [
            'id_no' => $request->id_no,
            'phone_no' => $request->phone_no,
            'names' => $request->names,
            'polling_center' => $request->polling_center,
            'ward' => $request->ward,
            'constituency' => $request->constituency,
            'voting_status' => $request->voting_status,
            'calling_agent' => $request->calling_agent,
            'candidate' => $request->candidate,
            'candidate_second_time' => $request->candidate_second_time,
            'call_status' => $request->call_status,
            'comments' => $request->comments
        ];


        JulyPolls::create($data);

        CallCenter::where('id_no', $request->id_no)->update(['called' => 1]);

        return back()->with('message','success');

    }

    public function pledgeReport(){

        $results = DB::select('select response, count(*) as total, (count(*) / (select count(response) from pledges_report)) * 100 as percentage from pledges_report where response != "" AND call_status="picked" GROUP BY response order by total desc');
        $constituency_results = DB::select('select response, constituency, count(*) as votes, (count(*) / (select count(response) from pledges_report)) * 100 as percentage from pledges_report where response != "" AND call_status="picked" GROUP BY response,constituency order by votes desc');
        $agents_stats = DB::select("select count(*) as total,calling_agent  from pledges_report where call_status = 'picked'  GROUP BY calling_agent order by total desc");


        $agents_stats_missed = DB::select("select count(*) as total,calling_agent  from pledges_report where call_status = 'missed'  GROUP BY calling_agent order by total desc");

        $agents_stats_total = DB::select("select count(*) as total,calling_agent  from pledges_report GROUP BY calling_agent order by total desc");

        $agents_stats_invalid = DB::select("select count(*) as total,calling_agent  from pledges_report where call_status = 'invalid'  GROUP BY calling_agent order by total desc");

        $total_agents = DB::select("select count(distinct calling_agent) as total from pledges_report ");


        $data = [
            'results' => $results,
            'constituency_results' => $constituency_results,
            'constituencies' => DB::select('select distinct constituency from pledge_database'),
            'total' => DB::select('select count(*) as total from pledges_report where response != "" AND call_status="picked"'),
            'constituency_total' => DB::select('select constituency,count(*) as total from pledges_report where response != "" AND call_status="picked" group by constituency'),
            'agents_stats' => $agents_stats,
            'agents_stats_missed' => $agents_stats_missed,
            'agents_stats_total' => $agents_stats_total,
            'agents_stats_invalid' => $agents_stats_invalid,
            'total_agents' => $total_agents,
            'total_calls' => PledgesReport::count(),
            'total_picked' => PledgesReport::where('call_status','picked')->where('response','!=',"")->count(),
            'total_missed' => PledgesReport::where('call_status','missed')->count(),
            'total_invalid' => PledgesReport::where('call_status','invalid')->count(),
            'total_unreachable' => PledgesReport::where('call_status','unreachable')->count(),
        ];


        return view('call_center.pledge_report',$data);

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

            $id = CallCenter::where('booked', 0)->where('phone_number','!=',0)->where('ward',Auth::user()->ward)->inRandomOrder()
                ->limit(1) // here is your limit
                ->pluck('id');


            $ward = Auth::user()->ward;

            //$id = DB::select("select id from muranga_registered_voters where booked = 0 and phone_number != 0 and polling_center not in(select distinct polling_center from kiagu_seventh_poll_results) order by RAND() limit 1");

            $phone_no = CallCenter::where('id',$id)->pluck('phone_number');

            if(!KiaguSeventhPoll::where('phone_no', $phone_no[0])->exists()){

                CallCenter::where('id', $id)->update(['booked'=>1]);
                //set booked_by
                CallCenter::where('id', $id)->update(['booked_by'=>Auth::user()->name]);


                //set id as booked

                    return CallCenter::where('id', $id)->where('booked_by', Auth::user()->name)->where('ward',Auth::user()->ward)->first();
            }
            else{

                //repeat until a user is found
                $this->fetchUser();
            }
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

    public function callCenterReportFive(){

        $results = DB::select("SELECT count(*) as total, (SELECT name from lari_mp_candidates where lari_mp_candidates.id = poll_five.candidate) as candidate FROM `poll_five` WHERE call_status = 'picked' and candidate is not null GROUP BY candidate order by total DESC
");
        $total = DB::select("SELECT count(*) as total from poll_five where call_status = 'picked'");

        $candidates_with_no_voters = DB::select("select id,name from lari_mp_candidates where id not in (SELECT candidate from poll_five where call_status = 'picked' and candidate is not null)
");
        $agents_stats = DB::select("select count(*) as total,calling_agent  from poll_five where call_status = 'picked'  GROUP BY calling_agent order by total desc");

        $total_agents = DB::select("select count(distinct calling_agent) as total from poll_five ");

        $total_picked = PollFive::where('call_status','picked')->count();

        $total_not_voting = DB::select("SELECT count(*) as total FROM poll_five where voting_status = 0
");

        if($total_agents[0]->total > 0){
            $agent_average =  $total_picked / $total_agents[0]->total;
        }
        else{
            $agent_average = 0;
        }


        $invalid = DB::select("SELECT count(*) as total from poll_five where call_status = 'picked' and candidate is null
");

        $polling_station_results = DB::select("select (SELECT name from lari_mp_candidates where lari_mp_candidates.id = poll_five.candidate) as candidate, polling_center, count(*) as votes, (count(*) / (select count(candidate) from poll_five)) * 100 as percentage from poll_five where call_status='picked' GROUP BY candidate,polling_center order by votes desc");

        $polling_station_total = DB::select("select polling_center,count(*) as total from poll_five where call_status = 'picked' GROUP BY polling_center
");

        $candidates = DB::select("select * from lari_mp_candidates");

        $polling_stations = DB::select("select distinct polling_station from kiagu_polling_stations");

        $data = [
            'polling_stations' => $polling_stations,
            'candidates' => $candidates,
            'polling_station_results' => $polling_station_results,
            'results' => $results,
            'total' => $total,
            'total_calls' => PollFive::count(),
            'total_picked' => PollFive::where('call_status','picked')->count(),
            'total_missed' => PollFive::where('call_status','missed')->count(),
            'total_invalid' => PollFive::where('call_status','invalid')->count(),
            'agent_average' => $agent_average,
            'total_unreachable' => PollFive::where('call_status','unreachable')->count(),
            'agents_stats' => $agents_stats,
            'invalid' => $invalid,
            'not_voting' => PollFive::where('voting_status',0)->count(),
            'non_voted_candidates' => $candidates_with_no_voters,
            'polling_station_total' => $polling_station_total
        ];


        return view('call_center.report_five', $data);
    }

    public function kiaguSeventhPollReport(){
        ini_set("memory_limit",-1);

        $results = DB::select("SELECT count(*) as total, (SELECT name from muranga_candidates where muranga_candidates.id = kiagu_seventh_poll_results.candidate) as candidate FROM `kiagu_seventh_poll_results` WHERE call_status = 'picked' and candidate is not null GROUP BY candidate order by total DESC
");
        $resultsB = DB::select("SELECT count(*) as total, (SELECT name from muranga_candidates where muranga_candidates.id = kiagu_seventh_poll_results.candidate_second_time) as candidate FROM `kiagu_seventh_poll_results` WHERE call_status = 'picked' and candidate_second_time is not null GROUP BY candidate_second_time order by total DESC
");

        $comments = DB::select("SELECT comments as comment, (SELECT name from muranga_candidates where muranga_candidates.id = kiagu_seventh_poll_results.candidate) as candidate FROM `kiagu_seventh_poll_results` WHERE call_status = 'picked' and candidate is not null");

        $categorized_comments = DB::select("SELECT count(*) as total, (SELECT name from reasons where reasons.id = kiagu_seventh_poll_results.comments) as reason FROM `kiagu_seventh_poll_results` WHERE call_status = 'picked' and comments is not null and candidate = 2 GROUP BY reason order by total DESC
");
        $total_categorized_comments = DB::select("SELECT count(*) as total from kiagu_seventh_poll_results where call_status = 'picked' and comments is not null and candidate = 2");

        $total = DB::select("SELECT count(*) as total from kiagu_seventh_poll_results where call_status = 'picked'");

        $candidates_with_no_voters = DB::select("select id,name from muranga_candidates where id not in (SELECT candidate from kiagu_seventh_poll_results where call_status = 'picked' and candidate is not null)
");

        $candidates_with_no_voters_b = DB::select("select id,name from muranga_candidates where id not in (SELECT candidate_second_time from kiagu_seventh_poll_results where call_status = 'picked' and candidate_second_time is not null)
");

        $agents_stats = DB::select("select count(*) as total,calling_agent  from kiagu_seventh_poll_results where call_status = 'picked'  GROUP BY calling_agent order by total desc");

        $agents_stats_missed = DB::select("select count(*) as total,calling_agent  from kiagu_seventh_poll_results where call_status = 'missed'  GROUP BY calling_agent order by total desc");

        $agents_stats_total = DB::select("select count(*) as total,calling_agent  from kiagu_seventh_poll_results GROUP BY calling_agent order by total desc");

        $agents_stats_invalid = DB::select("select count(*) as total,calling_agent  from kiagu_seventh_poll_results where call_status = 'invalid'  GROUP BY calling_agent order by total desc");

        $total_agents = DB::select("select count(distinct calling_agent) as total from kiagu_seventh_poll_results ");

        $total_picked = KiaguSeventhPoll::where('call_status','picked')->count();

        $total_not_voting = DB::select("SELECT count(*) as total FROM kiagu_seventh_poll_results where voting_status = 0
");

        if($total_agents[0]->total > 0){
            $agent_average =  $total_picked / $total_agents[0]->total;
        }
        else{
            $agent_average = 0;
        }


        $invalid = DB::select("SELECT count(*) as total from kiagu_seventh_poll_results where call_status = 'picked' and candidate is null");

        $polling_station_results = DB::select("select (SELECT name from muranga_candidates where muranga_candidates.id = kiagu_seventh_poll_results.candidate) as candidate, polling_center, count(*) as votes, (count(*) / (select count(candidate) from kiagu_seventh_poll_results)) * 100 as percentage from kiagu_seventh_poll_results where call_status='picked' GROUP BY candidate,polling_center order by votes desc");

        $polling_station_total = DB::select("select polling_center,count(*) as total from kiagu_seventh_poll_results where call_status = 'picked' GROUP BY polling_center");

        $constituency_total = DB::select("select constituency,count(*) as total from kiagu_seventh_poll_results where call_status = 'picked' GROUP BY constituency");

        $constituency_results = DB::select("select (SELECT name from muranga_candidates where muranga_candidates.id = kiagu_seventh_poll_results.candidate) as candidate, constituency, count(*) as votes, (count(*) / (select count(candidate) from kiagu_seventh_poll_results)) * 100 as percentage from kiagu_seventh_poll_results where call_status='picked' GROUP BY candidate,constituency order by votes desc");

        $ward_results = DB::select("select (SELECT name from muranga_candidates where muranga_candidates.id = kiagu_seventh_poll_results.candidate) as candidate, ward, count(*) as votes, (count(*) / (select count(candidate) from kiagu_seventh_poll_results)) * 100 as percentage from kiagu_seventh_poll_results where call_status='picked' GROUP BY candidate,ward order by votes desc");

        $ward_total = DB::select("select ward,count(*) as total from kiagu_seventh_poll_results where call_status = 'picked' GROUP BY ward");

        $candidates = DB::select("select * from muranga_candidates");

        $polling_stations = DB::select("select distinct polling_center as polling_station from muranga_registered_voters");

        $wards = DB::select("select distinct ward as ward from muranga_registered_voters");

        $constituencies = DB::select("select distinct constituency as constituency from muranga_registered_voters");

        $candidates = KiaguCandidates::all();

        $data = [
            'polling_stations' => $polling_stations,
            'comments' => $comments,
            'constituencies' => $constituencies,
            'wards' => $wards,
            'ward_results' => $ward_results,
            'ward_total' => $ward_total,
            'constituency_results' => $constituency_results,
            'constituency_total' => $constituency_total,
            'candidates' => $candidates,
            'polling_station_results' => $polling_station_results,
            'results' => $results,
            'resultsB' => $resultsB,
            'total' => $total,
            'total_calls' => KiaguSeventhPoll::count(),
            'total_picked' => KiaguSeventhPoll::where('call_status','picked')->count(),
            'total_missed' => KiaguSeventhPoll::where('call_status','missed')->count(),
            'total_invalid' => KiaguSeventhPoll::where('call_status','invalid')->count(),
            'agent_average' => $agent_average,
            'total_unreachable' => KiaguSeventhPoll::where('call_status','unreachable')->count(),
            'agents_stats' => $agents_stats,
            'agents_stats_missed' => $agents_stats_missed,
            'agents_stats_total' => $agents_stats_total,
            'agents_stats_invalid' => $agents_stats_invalid,
            'invalid' => $invalid,
            'not_voting' => KiaguSeventhPoll::where('voting_status',0)->count(),
            'non_voted_candidates' => $candidates_with_no_voters,
            'non_voted_candidates_b' => $candidates_with_no_voters_b,
            'polling_station_total' => $polling_station_total,
            'total_categorized_comments' => $total_categorized_comments,
            'categorized_comments' => $categorized_comments
        ];


        return view('call_center.kiagu_seventh_poll', $data);

    }

    public function febPollResults(){
        ini_set("memory_limit",-1);

        $results = DB::select("SELECT count(*) as total, (SELECT name from muranga_candidates where muranga_candidates.id = feb_poll_results.candidate) as candidate FROM `feb_poll_results` WHERE call_status = 'picked' and candidate is not null GROUP BY candidate order by total DESC
");
        $resultsB = DB::select("SELECT count(*) as total, (SELECT name from muranga_candidates where muranga_candidates.id = feb_poll_results.candidate_second_time) as candidate FROM `feb_poll_results` WHERE call_status = 'picked' and candidate_second_time is not null GROUP BY candidate_second_time order by total DESC
");

        $comments = DB::select("SELECT comments as comment, (SELECT name from muranga_candidates where muranga_candidates.id = feb_poll_results.candidate) as candidate FROM `feb_poll_results` WHERE call_status = 'picked' and candidate is not null");

        $categorized_comments = DB::select("SELECT count(*) as total, (SELECT name from reasons where reasons.id = feb_poll_results.comments) as reason FROM `feb_poll_results` WHERE call_status = 'picked' and comments is not null and candidate = 2 GROUP BY reason order by total DESC
");
        $total_categorized_comments = DB::select("SELECT count(*) as total from feb_poll_results where call_status = 'picked' and comments is not null and candidate = 2");

        $total = DB::select("SELECT count(*) as total from feb_poll_results where call_status = 'picked'");

        $candidates_with_no_voters = DB::select("select id,name from muranga_candidates where id not in (SELECT candidate from feb_poll_results where call_status = 'picked' and candidate is not null)
");

        $candidates_with_no_voters_b = DB::select("select id,name from muranga_candidates where id not in (SELECT candidate_second_time from feb_poll_results where call_status = 'picked' and candidate_second_time is not null)
");

        $agents_stats = DB::select("select count(*) as total,calling_agent  from feb_poll_results where call_status = 'picked'  GROUP BY calling_agent order by total desc");

        $agents_stats_missed = DB::select("select count(*) as total,calling_agent  from feb_poll_results where call_status = 'missed'  GROUP BY calling_agent order by total desc");

        $agents_stats_total = DB::select("select count(*) as total,calling_agent  from feb_poll_results GROUP BY calling_agent order by total desc");

        $agents_stats_invalid = DB::select("select count(*) as total,calling_agent  from feb_poll_results where call_status = 'invalid'  GROUP BY calling_agent order by total desc");

        $total_agents = DB::select("select count(distinct calling_agent) as total from feb_poll_results ");

        $total_picked = FebPolls::where('call_status','picked')->count();

        $total_not_voting = DB::select("SELECT count(*) as total FROM feb_poll_results where voting_status = 0
");

        if($total_agents[0]->total > 0){
            $agent_average =  $total_picked / $total_agents[0]->total;
        }
        else{
            $agent_average = 0;
        }


        $invalid = DB::select("SELECT count(*) as total from feb_poll_results where call_status = 'picked' and candidate is null");

        $polling_station_results = DB::select("select (SELECT name from muranga_candidates where muranga_candidates.id = feb_poll_results.candidate) as candidate, polling_center, count(*) as votes, (count(*) / (select count(candidate) from feb_poll_results)) * 100 as percentage from feb_poll_results where call_status='picked' GROUP BY candidate,polling_center order by votes desc");

        $polling_station_total = DB::select("select polling_center,count(*) as total from feb_poll_results where call_status = 'picked' GROUP BY polling_center");

        $constituency_total = DB::select("select constituency,count(*) as total from feb_poll_results where call_status = 'picked' GROUP BY constituency");

        $constituency_results = DB::select("select (SELECT name from muranga_candidates where muranga_candidates.id = feb_poll_results.candidate) as candidate, constituency, count(*) as votes, (count(*) / (select count(candidate) from feb_poll_results)) * 100 as percentage from feb_poll_results where call_status='picked' GROUP BY candidate,constituency order by votes desc");

        $ward_results = DB::select("select (SELECT name from muranga_candidates where muranga_candidates.id = feb_poll_results.candidate) as candidate, ward, count(*) as votes, (count(*) / (select count(candidate) from feb_poll_results)) * 100 as percentage from feb_poll_results where call_status='picked' GROUP BY candidate,ward order by votes desc");

        $ward_total = DB::select("select ward,count(*) as total from feb_poll_results where call_status = 'picked' GROUP BY ward");

        $candidates = DB::select("select * from muranga_candidates");

        $polling_stations = DB::select("select distinct polling_center as polling_station from muranga_registered_voters");

        $wards = DB::select("select distinct ward as ward from muranga_registered_voters");

        $constituencies = DB::select("select distinct constituency as constituency from muranga_registered_voters");

        $candidates = KiaguCandidates::all();

        $data = [
            'polling_stations' => $polling_stations,
            'comments' => $comments,
            'constituencies' => $constituencies,
            'wards' => $wards,
            'ward_results' => $ward_results,
            'ward_total' => $ward_total,
            'constituency_results' => $constituency_results,
            'constituency_total' => $constituency_total,
            'candidates' => $candidates,
            'polling_station_results' => $polling_station_results,
            'results' => $results,
            'resultsB' => $resultsB,
            'total' => $total,
            'total_calls' => FebPolls::count(),
            'total_picked' => FebPolls::where('call_status','picked')->count(),
            'total_missed' => FebPolls::where('call_status','missed')->count(),
            'total_invalid' => FebPolls::where('call_status','invalid')->count(),
            'total_special' => FebPolls::where('call_status','special')->count(),
            'total_transferred' => FebPolls::where('call_status','transferred')->count(),
            'agent_average' => $agent_average,
            'total_unreachable' => FebPolls::where('call_status','unreachable')->count(),
            'agents_stats' => $agents_stats,
            'agents_stats_missed' => $agents_stats_missed,
            'agents_stats_total' => $agents_stats_total,
            'agents_stats_invalid' => $agents_stats_invalid,
            'invalid' => $invalid,
            'not_voting' => FebPolls::where('voting_status',0)->count(),
            'non_voted_candidates' => $candidates_with_no_voters,
            'non_voted_candidates_b' => $candidates_with_no_voters_b,
            'polling_station_total' => $polling_station_total,
            'total_categorized_comments' => $total_categorized_comments,
            'categorized_comments' => $categorized_comments
        ];


        return view('call_center.feb_polls', $data);

    }

    public function marchPollResults(){
        ini_set("memory_limit",-1);

        $results = DB::select("SELECT count(*) as total, (SELECT name from muranga_candidates where muranga_candidates.id = march_poll_results.candidate) as candidate FROM `march_poll_results` WHERE call_status = 'picked' and candidate is not null GROUP BY candidate order by total DESC
");
        $resultsB = DB::select("SELECT count(*) as total, (SELECT name from muranga_candidates where muranga_candidates.id = march_poll_results.candidate_second_time) as candidate FROM `march_poll_results` WHERE call_status = 'picked' and candidate_second_time is not null GROUP BY candidate_second_time order by total DESC
");

        $comments = DB::select("SELECT comments as comment, (SELECT name from muranga_candidates where muranga_candidates.id = march_poll_results.candidate) as candidate FROM `march_poll_results` WHERE call_status = 'picked' and candidate is not null");

        $categorized_comments = DB::select("SELECT count(*) as total, (SELECT name from reasons where reasons.id = march_poll_results.comments) as reason FROM `march_poll_results` WHERE call_status = 'picked' and comments is not null and candidate = 2 GROUP BY reason order by total DESC
");
        $total_categorized_comments = DB::select("SELECT count(*) as total from march_poll_results where call_status = 'picked' and comments is not null and candidate = 2");

        $total = DB::select("SELECT count(*) as total from march_poll_results where call_status = 'picked'");

        $candidates_with_no_voters = DB::select("select id,name from muranga_candidates where id not in (SELECT candidate from march_poll_results where call_status = 'picked' and candidate is not null)
");

        $candidates_with_no_voters_b = DB::select("select id,name from muranga_candidates where id not in (SELECT candidate_second_time from march_poll_results where call_status = 'picked' and candidate_second_time is not null)
");

        $agents_stats = DB::select("select count(*) as total,calling_agent  from march_poll_results where call_status = 'picked'  GROUP BY calling_agent order by total desc");

        $agents_stats_missed = DB::select("select count(*) as total,calling_agent  from march_poll_results where call_status = 'missed'  GROUP BY calling_agent order by total desc");

        $agents_stats_total = DB::select("select count(*) as total,calling_agent  from march_poll_results GROUP BY calling_agent order by total desc");

        $agents_stats_invalid = DB::select("select count(*) as total,calling_agent  from march_poll_results where call_status = 'invalid'  GROUP BY calling_agent order by total desc");

        $total_agents = DB::select("select count(distinct calling_agent) as total from march_poll_results ");

        $total_picked = MarchPolls::where('call_status','picked')->count();

        $total_not_voting = DB::select("SELECT count(*) as total FROM march_poll_results where voting_status = 0
");

        if($total_agents[0]->total > 0){
            $agent_average =  $total_picked / $total_agents[0]->total;
        }
        else{
            $agent_average = 0;
        }


        $invalid = DB::select("SELECT count(*) as total from march_poll_results where call_status = 'picked' and candidate is null");

        $polling_station_results = DB::select("select (SELECT name from muranga_candidates where muranga_candidates.id = march_poll_results.candidate) as candidate, polling_center, count(*) as votes, (count(*) / (select count(candidate) from march_poll_results)) * 100 as percentage from march_poll_results where call_status='picked' GROUP BY candidate,polling_center order by votes desc");

        $polling_station_total = DB::select("select polling_center,count(*) as total from march_poll_results where call_status = 'picked' GROUP BY polling_center");

        $constituency_total = DB::select("select constituency,count(*) as total from march_poll_results where call_status = 'picked' GROUP BY constituency");

        $constituency_results = DB::select("select (SELECT name from muranga_candidates where muranga_candidates.id = march_poll_results.candidate) as candidate, constituency, count(*) as votes, (count(*) / (select count(candidate) from march_poll_results)) * 100 as percentage from march_poll_results where call_status='picked' GROUP BY candidate,constituency order by votes desc");

        $ward_results = DB::select("select (SELECT name from muranga_candidates where muranga_candidates.id = march_poll_results.candidate) as candidate, ward, count(*) as votes, (count(*) / (select count(candidate) from march_poll_results)) * 100 as percentage from march_poll_results where call_status='picked' GROUP BY candidate,ward order by votes desc");

        $ward_total = DB::select("select ward,count(*) as total from march_poll_results where call_status = 'picked' GROUP BY ward");

        $candidates = DB::select("select * from muranga_candidates");

        $polling_stations = DB::select("select distinct polling_center as polling_station from muranga_registered_voters");

        $wards = DB::select("select distinct ward as ward from muranga_registered_voters");

        $constituencies = DB::select("select distinct constituency as constituency from muranga_registered_voters");

        $candidates = KiaguCandidates::all();

        $data = [
            'polling_stations' => $polling_stations,
            'comments' => $comments,
            'constituencies' => $constituencies,
            'wards' => $wards,
            'ward_results' => $ward_results,
            'ward_total' => $ward_total,
            'constituency_results' => $constituency_results,
            'constituency_total' => $constituency_total,
            'candidates' => $candidates,
            'polling_station_results' => $polling_station_results,
            'results' => $results,
            'resultsB' => $resultsB,
            'total' => $total,
            'total_calls' => MarchPolls::count(),
            'total_picked' => MarchPolls::where('call_status','picked')->count(),
            'total_missed' => MarchPolls::where('call_status','missed')->count(),
            'total_invalid' => MarchPolls::where('call_status','invalid')->count(),
            'total_special' => MarchPolls::where('call_status','special')->count(),
            'total_transferred' => MarchPolls::where('call_status','transferred')->count(),
            'agent_average' => $agent_average,
            'total_unreachable' => MarchPolls::where('call_status','unreachable')->count(),
            'agents_stats' => $agents_stats,
            'agents_stats_missed' => $agents_stats_missed,
            'agents_stats_total' => $agents_stats_total,
            'agents_stats_invalid' => $agents_stats_invalid,
            'invalid' => $invalid,
            'not_voting' => MarchPolls::where('voting_status',0)->count(),
            'non_voted_candidates' => $candidates_with_no_voters,
            'non_voted_candidates_b' => $candidates_with_no_voters_b,
            'polling_station_total' => $polling_station_total,
            'total_categorized_comments' => $total_categorized_comments,
            'categorized_comments' => $categorized_comments
        ];


        return view('call_center.march_polls', $data);
    }

    public function julyPollReport(){

        ini_set("memory_limit",-1);

        $results = DB::select("SELECT count(*) as total, (SELECT name from muranga_candidates where muranga_candidates.id = july_poll_report.candidate) as candidate FROM `july_poll_report` WHERE call_status = 'picked' and candidate is not null GROUP BY candidate order by total DESC
");
        $resultsB = DB::select("SELECT count(*) as total, (SELECT name from muranga_candidates where muranga_candidates.id = july_poll_report.candidate_second_time) as candidate FROM `july_poll_report` WHERE call_status = 'picked' and candidate_second_time is not null GROUP BY candidate_second_time order by total DESC
");

        $comments = DB::select("SELECT comments as comment, (SELECT name from muranga_candidates where muranga_candidates.id = july_poll_report.candidate) as candidate FROM `july_poll_report` WHERE call_status = 'picked' and candidate is not null");

        $categorized_comments = DB::select("SELECT count(*) as total, (SELECT name from reasons where reasons.id = july_poll_report.comments) as reason FROM `july_poll_report` WHERE call_status = 'picked' and comments is not null and candidate = 2 GROUP BY reason order by total DESC
");
        $total_categorized_comments = DB::select("SELECT count(*) as total from july_poll_report where call_status = 'picked' and comments is not null and candidate = 2");

        $total = DB::select("SELECT count(*) as total from july_poll_report where call_status = 'picked'");

        $candidates_with_no_voters = DB::select("select id,name from muranga_candidates where id not in (SELECT candidate from july_poll_report where call_status = 'picked' and candidate is not null)
");

        $candidates_with_no_voters_b = DB::select("select id,name from muranga_candidates where id not in (SELECT candidate_second_time from july_poll_report where call_status = 'picked' and candidate_second_time is not null)
");

        $agents_stats = DB::select("select count(*) as total,calling_agent  from july_poll_report where call_status = 'picked'  GROUP BY calling_agent order by total desc");

        $agents_stats_missed = DB::select("select count(*) as total,calling_agent  from july_poll_report where call_status = 'missed'  GROUP BY calling_agent order by total desc");

        $agents_stats_total = DB::select("select count(*) as total,calling_agent  from july_poll_report GROUP BY calling_agent order by total desc");

        $agents_stats_invalid = DB::select("select count(*) as total,calling_agent  from july_poll_report where call_status = 'invalid'  GROUP BY calling_agent order by total desc");

        $total_agents = DB::select("select count(distinct calling_agent) as total from july_poll_report ");

        $total_picked = JulyPolls::where('call_status','picked')->count();

        $total_not_voting = DB::select("SELECT count(*) as total FROM july_poll_report where voting_status = 0
");

        if($total_agents[0]->total > 0){
            $agent_average =  $total_picked / $total_agents[0]->total;
        }
        else{
            $agent_average = 0;
        }


        $invalid = DB::select("SELECT count(*) as total from july_poll_report where call_status = 'picked' and candidate is null");

        $polling_station_results = DB::select("select (SELECT name from muranga_candidates where muranga_candidates.id = july_poll_report.candidate) as candidate, polling_center, count(*) as votes, (count(*) / (select count(candidate) from july_poll_report)) * 100 as percentage from july_poll_report where call_status='picked' GROUP BY candidate,polling_center order by votes desc");

        $polling_station_total = DB::select("select polling_center,count(*) as total from july_poll_report where call_status = 'picked' GROUP BY polling_center");

        $constituency_total = DB::select("select constituency,count(*) as total from july_poll_report where call_status = 'picked' GROUP BY constituency");

        $constituency_results = DB::select("select (SELECT name from muranga_candidates where muranga_candidates.id = july_poll_report.candidate) as candidate, constituency, count(*) as votes, (count(*) / (select count(candidate) from july_poll_report)) * 100 as percentage from july_poll_report where call_status='picked' GROUP BY candidate,constituency order by votes desc");

        $ward_results = DB::select("select (SELECT name from muranga_candidates where muranga_candidates.id = july_poll_report.candidate) as candidate, ward, count(*) as votes, (count(*) / (select count(candidate) from july_poll_report)) * 100 as percentage from july_poll_report where call_status='picked' GROUP BY candidate,ward order by votes desc");

        $ward_total = DB::select("select ward,count(*) as total from july_poll_report where call_status = 'picked' GROUP BY ward");

        $candidates = DB::select("select * from muranga_candidates");

        $polling_stations = DB::select("select distinct polling_center as polling_station from muranga_registered_voters");

        $wards = DB::select("select distinct ward as ward from muranga_registered_voters");

        $constituencies = DB::select("select distinct constituency as constituency from muranga_registered_voters");

        $candidates = KiaguCandidates::all();

        $data = [
            'polling_stations' => $polling_stations,
            'comments' => $comments,
            'constituencies' => $constituencies,
            'wards' => $wards,
            'ward_results' => $ward_results,
            'ward_total' => $ward_total,
            'constituency_results' => $constituency_results,
            'constituency_total' => $constituency_total,
            'candidates' => $candidates,
            'polling_station_results' => $polling_station_results,
            'results' => $results,
            'resultsB' => $resultsB,
            'total' => $total,
            'total_calls' => JulyPolls::count(),
            'total_picked' => JulyPolls::where('call_status','picked')->count(),
            'total_missed' => JulyPolls::where('call_status','missed')->count(),
            'total_invalid' => JulyPolls::where('call_status','invalid')->count(),
            'total_special' => JulyPolls::where('call_status','special')->count(),
            'total_transferred' => JulyPolls::where('call_status','transferred')->count(),
            'agent_average' => $agent_average,
            'total_unreachable' => JulyPolls::where('call_status','unreachable')->count(),
            'agents_stats' => $agents_stats,
            'agents_stats_missed' => $agents_stats_missed,
            'agents_stats_total' => $agents_stats_total,
            'agents_stats_invalid' => $agents_stats_invalid,
            'invalid' => $invalid,
            'not_voting' => JulyPolls::where('voting_status',0)->count(),
            'non_voted_candidates' => $candidates_with_no_voters,
            'non_voted_candidates_b' => $candidates_with_no_voters_b,
            'polling_station_total' => $polling_station_total,
            'total_categorized_comments' => $total_categorized_comments,
            'categorized_comments' => $categorized_comments
        ];

        return view('call_center.july_polls', $data);
}
    public function mahooResults(){

        $results = DB::select("SELECT count(*) as total, (SELECT name from mahoo_candidates where mahoo_candidates.id = mahoo_response.candidate) as candidate FROM `mahoo_response` WHERE call_status = 'picked' and candidate is not null GROUP BY candidate order by total DESC
");
        $total = DB::select("SELECT count(*) as total from mahoo_response where call_status = 'picked'");

        $candidates_with_no_voters = DB::select("select id,name from mahoo_candidates where id not in (SELECT candidate from mahoo_response where call_status = 'picked' and candidate is not null)
");
        $agents_stats = DB::select("select count(*) as total,calling_agent  from mahoo_response where call_status = 'picked'  GROUP BY calling_agent order by total desc");

        $total_agents = DB::select("select count(distinct calling_agent) as total from mahoo_response ");

        $total_picked = MahooResponse::where('call_status','picked')->count();

        $total_not_voting = DB::select("SELECT count(*) as total FROM mahoo_response where voting_status = 0
");

        if($total_agents[0]->total > 0){
            $agent_average =  $total_picked / $total_agents[0]->total;
        }
        else{
            $agent_average = 0;
        }


        $invalid = DB::select("SELECT count(*) as total from mahoo_response where call_status = 'picked' and candidate is null
");

        $polling_station_results = DB::select("select (SELECT name from mahoo_candidates where mahoo_candidates.id = mahoo_response.candidate) as candidate, polling_center, count(*) as votes, (count(*) / (select count(candidate) from mahoo_response)) * 100 as percentage from mahoo_response where call_status='picked' GROUP BY candidate,polling_center order by votes desc");

        $polling_station_total = DB::select("select polling_center,count(*) as total from mahoo_response where call_status = 'picked' GROUP BY polling_center
");

        $candidates = DB::select("select * from mahoo_candidates");

        $polling_stations = DB::select("select distinct polling_center from mahoo_registered_voters");

        $data = [
            'polling_stations' => $polling_stations,
            'candidates' => $candidates,
            'polling_station_results' => $polling_station_results,
            'results' => $results,
            'total' => $total,
            'total_calls' => MahooResponse::count(),
            'total_picked' => MahooResponse::where('call_status','picked')->count(),
            'total_missed' => MahooResponse::where('call_status','missed')->count(),
            'total_invalid' => MahooResponse::where('call_status','invalid')->count(),
            'agent_average' => $agent_average,
            'total_unreachable' => MahooResponse::where('call_status','unreachable')->count(),
            'agents_stats' => $agents_stats,
            'invalid' => $invalid,
            'not_voting' => MahooResponse::where('voting_status',0)->count(),
            'non_voted_candidates' => $candidates_with_no_voters,
            'polling_station_total' => $polling_station_total
        ];

        return view('call_center.mahoo_response', $data);
    }

    public function addRegisteredVoters(){

        $constituencies = DB::select('select distinct constituency from muranga_registered_voters');
        $ward = DB::select('select distinct ward from muranga_registered_voters');
        $polling_station = DB::select('select distinct polling_center from muranga_registered_voters');


        $data = [
            'constituencies' => $constituencies,
            'wards' => $ward,
            'polling_stations' => $polling_station
        ];

        return view('call_center.add_registered_voters' , $data);
    }

    public function saveRegisteredVoters(Request $request){


        CallCenter::create($request->all());

        return back()->with('message','saved-succesfully');
    }

    public function allocateAgents(){

        $ward = DB::select('select distinct ward from muranga_registered_voters');
        $users = User::all();

        $data = [
            'wards' => $ward,
            'users' => $users
        ];

        return view('call_center.allocate', $data);
    }

    public function saveAllocation(Request $request){

        $user = $request->user;
        $ward = $request->ward;

        User::where('id', $user)->update([
            'ward' => $ward
        ]);

        return back()->with('message','Agent Allocated');
    }
}
