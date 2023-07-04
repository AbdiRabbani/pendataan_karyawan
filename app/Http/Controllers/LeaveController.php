<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biodata;
use App\LeavePermit;
use App\User;

use App\Mail\SendMailManager;
use App\Mail\SendMailSuper;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

use Session;


class LeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave = LeavePermit::where('id_luser', Auth()->user()->id)->get()->all();

        $total = LeavePermit::where('id_luser', Auth()->user()->id)->sum('total_leave');
        
        $manager = LeavePermit::where('id_manager' , Auth()->user()->id)->get()->all();
        
        $supervisor = LeavePermit::where('id_supervisor', Auth()->user()->id)->get()->all();
        $admin = LeavePermit::all();

        $total_leave = LeavePermit::where('id_luser', Auth()->user()->id)->sum('total_leave');
        $annual_limit = Biodata::where('id_user', Auth()->user()->id)->sum('leaveperyear');

        $result = $annual_limit - $total_leave;

        return view('leave.index', compact('leave', 'manager', 'admin', 'supervisor', 'annual_limit', 'result', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $total_leave = LeavePermit::where('id_luser', Auth()->user()->id)->sum('total_leave');
        $annual_limit = Biodata::where('id_user', Auth()->user()->id)->sum('leaveperyear');
        $result = $annual_limit - $total_leave;

        $user = Biodata::where('id_user', Auth()->user()->id)->get()->all();
        return view('leave.create-leave', compact('user', 'result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $leave = LeavePermit::all();

        // dd(User::where('id' , $request->id_supervisor)->get('email'));

        LeavePermit::create($request->all());

        $total_leave = LeavePermit::where('id_luser', Auth()->user()->id)->sum('total_leave');
        $annual_limit = Biodata::where('id_user', Auth()->user()->id)->sum('leaveperyear');
        $result = $annual_limit - $total_leave;

        $data = [
            'user' => User::where('id' , $request->id_luser)->get('name'),
            'manager' => User::where('id' , $request->id_manager)->get('name'),
            'supervisor' => User::where('id' , $request->id_supervisor)->get('name'),
            'admin' => User::where('level' , 'admin')->get('name'),
            'desc' => $request->name,
            'start' => $request->start_leave,
            'end' => $request->end_leave,
        ];

        if(Auth()->user()->level == "staff" || Auth()->user()->level == "administration") {
            Mail::to(User::where('id' , $request->id_manager)->get('email'))->send(new SendMailManager($data));
            Mail::to(User::where('id' , $request->id_supervisor)->get('email'))->send(new SendMailSuper($data));
            Mail::to(User::where('level' , 'admin')->get('email'))->send(new SendMail($data));
        } else {
            Mail::to(User::where('level' , 'admin')->get('email'))->send(new SendMail($data));
        }

        Session::flash('message', 'Thank you for yout email');
        return redirect('/leave');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $leave = LeavePermit::find($id);

        $leave->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LeavePermit::find($id);
        $data->delete();
        
        return redirect('/leave');
    }

    public function deleteAll()
    {
        LeavePermit::query()->delete();

        return redirect('/leave');
    }

    public function history() {
        $leave = LeavePermit::all();

        return view('leave.history-leave', compact('leave'));
    }
}
