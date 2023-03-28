<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biodata;
use App\User;
use App\Title;
use App\Dept;
use App\Family;
use App\LeavePermit;
use DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $total_leave = LeavePermit::where('id_luser', Auth()->user()->id)->sum('total_leave');
        $annual_limit = Biodata::where('id_user', Auth()->user()->id)->sum('leaveperyear');

        $result = $annual_limit - $total_leave;

        $bio = Biodata::where('id_user', auth()->user()->id)->get()->all();
        $family = Family::where('id_fuser', auth()->user()->id)->get()->all();
        return view('profile.index', compact('bio', 'family', 'result'));
    }
}
