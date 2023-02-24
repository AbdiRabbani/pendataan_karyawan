<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biodata;
use App\User;
use App\Title;
use App\Dept;
use DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user = User::all();
        $bio = Biodata::where('id_user', auth()->user()->id)->get()->all();
        $title = Title::where('id', 2)->get()->all();
        $dept = Dept::where('id', 2)->get()->all();
        return view('profile.index', compact('bio', 'user', 'title', 'dept'));
    }
}
