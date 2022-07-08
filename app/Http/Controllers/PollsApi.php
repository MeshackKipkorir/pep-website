<?php

namespace App\Http\Controllers;

use App\Models\KiaguThirdPoll;
use App\Models\LariMpCandidates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollsApi extends Controller
{
    //
    public function index(){

        $presidential_results = DB::select("
          select voting_for, (SELECT name from lari_mp_candidates where lari_mp_candidates.id = kiagu_third_poll.voting_for) as candidate, (select count(voting_for) from kiagu_third_poll ) as total, count(*) as votes, (count(*) / (select count(voting_for) from kiagu_third_poll)) * 100 as percentage from kiagu_third_poll where voting_for >= 1 and voting_for <= 14 GROUP BY voting_for ORDER BY `votes` DESC
        ");

        $presidential_candidates = LariMpCandidates::all();

        $constituency_total = DB::select("
         SELECT constituency,count(*) as total FROM `kiagu_third_poll` group by constituency order by total desc;
        ");

        $ward_total = DB::select("
         SELECT ward,count(*) as total FROM `kiagu_third_poll` group by ward order by total desc;
        ");

        $polling_total = DB::select("
         SELECT polling_station,count(*) as total FROM `kiagu_third_poll` group by polling_station order by total desc;
        ");

        $polling_stations = DB::select("
        SELECT DISTINCT polling_center FROM `kiagu_registered_voters`;
        ");


        $polling_stations_results = DB::select("
        select voting_for, polling_station, count(*) as votes, (count(*) / (select count(voting_for) from kiagu_third_poll)) * 100 as percentage, (select name from lari_mp_candidates where lari_mp_candidates.id = kiagu_third_poll.voting_for) as candidate from kiagu_third_poll GROUP BY voting_for,polling_station order by votes desc
          ");

        $wards = DB::select("
        SELECT DISTINCT ward FROM `kiagu_registered_voters`;
        ");

        $ward_results = DB::select("
            select voting_for, ward, count(*) as votes, (count(*) / (select count(voting_for) from kiagu_third_poll)) * 100 as percentage from kiagu_third_poll GROUP BY voting_for,ward order by votes desc;
          ");

        $constituencies = DB::select("
        SELECT DISTINCT constituency FROM `kiagu_registered_voters`;
        ");

        $constituency_results = DB::select("
            select voting_for, constituency, count(*) as votes, (count(*) / (select count(voting_for) from kiagu_third_poll)) * 100 as percentage from kiagu_third_poll GROUP BY voting_for,constituency order by votes desc;
          ");

        return view('ussd.ussd',[
            'presidential_results' => $presidential_results,
            'presidents_dict' => $presidential_candidates,
            'total' => KiaguThirdPoll::count(),
            'polling_stations' => $polling_stations,
            'polling_station_results' => $polling_stations_results,
            'wards' => $wards,
            'ward_results' => $ward_results,
            'constituency_results' => $constituency_results,
            'constituencies' => $constituencies,
            'constituency_total' => $constituency_total,
            'ward_total' => $ward_total,
            'polling_total' => $polling_total
        ]);
    }

    public function mainResults(){

        return view('ussd.ussd');
    }
}
