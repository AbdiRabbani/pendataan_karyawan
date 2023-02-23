<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biodata;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $bio = Biodata::all();
        return view('profile.index', compact('bio'));
    }
}
