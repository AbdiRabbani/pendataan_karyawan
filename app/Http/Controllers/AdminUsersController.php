<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Title;
use App\Dept;
use App\Biodata;
use Validator;


class AdminUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        $user = User::all();
        return view('user.index', compact('user'));
    }

    public function destroy($id) {
        $data = User::find($id);
        $data->delete();
        return back();
    }

    public function edit($id) {
        $title = Title::all();
        $dept = Dept::all();
        $user = User::findOrFail($id);
        // $biodata = Biodata::where('id_user', $id)->get()->all(); untuk foreach
        $biodata = User::where('id_bio', $id)->get()->all();
        return view('user.edit-user', compact('user', 'title', 'dept', 'biodata'));
    }

    public function update(Request $request, $id) {
        $usr = User::findOrFail($id);
        $data = $request->all();
        $usr->update($data);
        return redirect('/user');
    }

    public function create(){
        $user = User::all();
        return view('user.create-user', compact('user'));
    }

    public function save(Request $request) {
        $input = $request->all();
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/user');
    }

    public function saveBio(Request $request) {
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
}
