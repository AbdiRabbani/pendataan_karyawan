<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dept;
use App\User;

class DeptController extends Controller
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
        $dept = Dept::all();
        $manager = User::where('level', 'manager')->get()->all();
        $supervisor = User::where('level', 'supervisor')->get()->all();
        return view('departement.index', compact('dept', 'manager', 'supervisor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Dept::create($input);
        return redirect('/departement');
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
        $dept = Dept::findOrFail($id);
        
        $manager = User::where('level', 'manager')->get()->all();
        $supervisor = User::where('level', 'supervisor')->get()->all();
        return view('departement.edit-dept', compact('dept', 'manager', 'supervisor'));
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
        $dept = Dept::findOrFail($id);
        $data = $request->all();
        $dept->update($data);
        return redirect('/departement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Dept::find($id);
        $data->delete();
        return back();
    }
}
