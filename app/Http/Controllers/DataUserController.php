<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Hash;    
use App\Title;
use App\Family;
use App\Dept;
use App\Biodata;
use Illuminate\Auth\Events\Validated;
use Validator;

class DataUserController extends Controller
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
        $user = User::all();
        $bio = Biodata::all();
        return view('user.index', compact('user', 'bio'))->with('message', 'success add user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();

        return view('user.create-user', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $input = $request->all();



        $this->validate(
            $request,
            [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users,email' . $user->id,
                'level' => 'required',
                'password' => 'required',
            ],
            [
                'email.unique' => 'Email sudah tersedia',
            ]
        );

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'level' => $request['level'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('/user');
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
        $user = User::findOrFail($id);
        return view('user.user-edit', compact('user'));
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
        $user = User::find($id);
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'level' => $request['level'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);

        $data->delete();
        return redirect('/user');
    }
}
