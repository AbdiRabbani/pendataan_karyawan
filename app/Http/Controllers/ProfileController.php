<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biodata;
use App\User;
use App\Title;
use App\Dept;
use App\Family;
use DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $bio = Biodata::where('id_user', auth()->user()->id)->get()->all();
        $family = Family::where('id', auth()->user()->id)->get()->all();
        return view('profile.index', compact('bio', 'family'));
    }
}
