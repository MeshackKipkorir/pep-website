<?php

namespace App\Http\Controllers;

use App\Models\Diaspora;
use App\Models\Feedback;
use App\Models\Target;
use Illuminate\Http\Request;
use App\Models\Aspirant;
use App\Models\Members;
use App\Models\PartyMembers;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use PhpParser\Node\Stmt\Echo_;


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

    public function viewAspirants(){

        $aspirants = DB::select('select * from aspirants order by county asc');
        $counties = Aspirant::groupBy('county')->get();

        $data = [
            'aspirants' => $aspirants,
            'counties' => $counties
        ];

        return view('view_aspirants', $data);
    }

    public function viewAspirantsPerClass(){
        $classes = Aspirant::groupBy('class')->orderBy('class')->where('class' ,'!=','')->get();
        $aspirants = DB::select('select * from aspirants where class != ""');

        $dict = [
            'class_one' => 'Saturday 7th August: Samburu, Laikipia & Nyandarua- Nyahururu',
            'class_two' => 'Monday 9th August- Nakuru & Baringo- Nakuru',
            'class_three' => 'Thursday 12th August: Kericho, Bomet & Narok - Narok',
            'class_four' => 'Saturday 14th August- Nyeri- Nyeri',
            'class_five' => 'Monday 16th August- Kirinyaga-Sagana',
            'class_six' => 'Tuesday 17th August- Muranga- Stanley\'s Haven',
            'class_seven' => 'Wednesday 18th August- Kiambu- Ruaka',
            'class_eight' => 'Thursday 2nd September- Kajiado & Nairobi- Nairobi',
            'class_nine' => 'Friday 3rd September- Garrisa, Wajir, Mandera, Machakos, Makueni & Kitui- Machakos',
            'class_ten' => 'Saturday 4th September-Meru, Tharaka Nithi, Embu, Isiolo, Marsabit- Meru',
            'class_eleven' => 'Monday 6th September- Tana River, Lamu, Taita Taveta, Kilifi, Mombasa & Kwale- Mombasa',
            'class_twelve' => 'Wednesday 8th September- Kisii & Nyamira- Kisii',
            'class_thirteen' => 'Friday 10th September- Uasin Gishu, Nandi, Elegeyo Marakwet- Eldoret',
            'class_fourteen' => 'Saturday 11th September- Trans Nzoia, West Pokot & Turkana- Kitale',
            'class_fifteen' => 'Monday 13th September- Bungoma, Vihiga, Busia & Kakamega- Kakamega',
            'class_sixteen' => 'Tuesday 14th September- Migori, Homa Bay, Kisumu & Siaya- Kisumu',
            '' => 'no class'
        ];

        $data = [
            'classes' => $classes,
            'class_dict' => $dict,
            'aspirants' => $aspirants
        ];


        return view('view_aspirants_per_class', $data);
    }

    public function diasporaRegistration(){

        return view('diaspora_registration');
    }

    public function storeDiaspora(Request $request){

        $data = $request->all();
        Diaspora::create($data);

        return response()->json([
            'message' => 200
        ]);
    }

    public function saveFeedback(Request $request){

        $data = $request->all();
        Feedback::create($data);

        return response()->json([
            'message' => 200
        ]);
    }

    public function viewDiaspora(){

        $countries = Diaspora::groupBy('country_of_residence')->get();

        $diasporas = Diaspora::all();

        $data = [
          'countries' => $countries,
          'diasporas' => $diasporas
        ];

        return view('view_diasporas', $data);
    }

    public function target(){
        ini_set('memory_limit', '-1');


        $statistics = Target::all();
        $counties = DB::select('SELECT DISTINCT county_name from voters_statistics');
        $constituencies = DB::select('SELECT DISTINCT constituency_name FROM `voters_statistics`');
        $totals = DB::select('SELECT sum(population_2019) as population_2019,sum(current_registered_voters) as current_registered_voters,sum(projected_registered_voters) as projected_registered_voters,sum(target_2022) as target_2022,sum(target_2021) as target_2021,sum(enrollment_per_kit) as enrollment_per_kit,sum(enrollment_per_day) as enrollment_per_day,constituency_name FROM `voters_statistics` GROUP BY constituency_name
');

        $data = [
            'statistics' => $statistics,
            'counties' => $counties,
            'constituencies' => $constituencies,
            'totals' => $totals
        ];

        return view('data.target',$data);
    }

    public function fetchUssdmembers(){

        $client = new Client();
        $res = $client->get('https://uchaguzi.chanukafintech.com/api/fetch_registered_members',array());

        $data  = $res->getBody();

        $decoded = json_decode($data, true);


       return view('ussd_members')->with('members',$decoded);
    }

    public function fetchUssdAspirants(){

        $client = new Client();
        $res = $client->get('https://uchaguzi.chanukafintech.com/api/fetch_registered_aspirants',array());

        $data  = $res->getBody();

        $decoded = json_decode($data, true);

        //dd($decoded);
        return view('ussd_aspirants')->with('members',$decoded);
    }
}
