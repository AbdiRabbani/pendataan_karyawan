<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Biodata;
use App\Title;
use App\Dept;
use App\User;

class DataBioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bio = Biodata::all();
        return view('biodata.index', compact('bio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::find($id);
        $bio = Biodata::all();
        $title = Title::all();
        $dept = Dept::all();
        return view('biodata.biodata-create', compact('user', 'bio', 'title', 'dept'));
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
        $validator = Validator::make($input,[
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:10240'
        ]);

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
        $bio = Biodata::where('id', $id)->get()->all();
        return view('biodata.biodata-detail', compact('bio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bio = Biodata::find($id);
        $title = Title::all();
        $dept = Dept::all();
        return view('biodata.biodata-edit', compact('bio', 'title', 'dept'));
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
        $bio = Biodata::findOrFail($id);
        $bio->update($request->all());
        return redirect('/biodata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
