<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Title;
use App\Dept;
use App\Biodata;
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
        return view('user.index', compact('user'));
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
    public function store(Request $request)
    {
        $input = $request->all();
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/user');
    }

    public function biostore(Request $request)
    {
        $input = $request->all();

        // requirement column nama dan photo
        $validator = Validator::make($input,[
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:10240'
        ]);


        // // validasi untuk data yang apabila gagal, maka akan keluar error data tidak valid
        // if($validator->fails())
        // {  
        //     // return redirect()->route('kategori.create')->withErrors($validator)->withInput();
        //     return 'Data Tidak Valid';
        // }

        // kondisi input foto (file)
        if($request->hasFile('photo'))
        {
            $destination_path = 'public/images/profile'; //path tempat penyimpanan (storage/public/images/profile)
            $image = $request -> file('photo'); //mengambil request column photo
            $image_name = $image->getClientOriginalName(); //memberikan nama gambar yang akan disimpan di foto
            $path = $request->file('photo')->storeAs($destination_path, $image_name); //mengirimkan foto ke folder store
            $input['photo'] = $image_name; //mengirimkan ke database
        }
        Biodata::create($input);
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
        $title = Title::all();
        $dept = Dept::all();
        $user = User::findOrFail($id);
        $bio = Biodata::where('id_user', $id)->get()->all();
        return view('user.edit-user', compact('user', 'title', 'dept', 'bio'));
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
        $user->update($request->all());
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
