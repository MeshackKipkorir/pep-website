<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirant;
use App\Models\Members;
use App\Models\PartyMembers;
use Illuminate\Support\Facades\DB;

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
}
