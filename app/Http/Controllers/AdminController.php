<?php

namespace App\Http\Controllers;

use App\Models\Diaspora;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\Aspirant;
use App\Models\Members;
use App\Models\PartyMembers;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //index

    public function index(){

        return view('dashboard.admin_index');
    }

    //view all registered member
    public function viewRegisteredMembers(){


        $registered_members = PartyMembers::all();

        $data = [
            'members' => $registered_members
        ];

        return view('dashboard.view_registered_members', $data);
    }
}
