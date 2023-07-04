<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Biodata;
use App\Dept;
use App\User;
use App\Family;
use App\LeavePermit;

class DataBioController extends Controller
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
        $usr = User::all();
        $bio = Biodata::all();
        $dept = Dept::all();
        return view('biodata.biodata-create', compact('user', 'bio', 'dept', 'usr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        //Create Family
        
        $data = $request -> all();
        // dd($data);

        if($request->fname) {
            foreach ($data['fname'] as $item => $value) {
                $data2 = array(
                    'id_fuser' => $data['id_fuser'][$item],
                    'fname' => $data['fname'][$item],
                    'gender' => $data['gender'][$item],
                    'relation' => $data['relation'][$item],
                    'dob' => $data['dob'][$item],
                    'f_bpjs_kesehatan_member_no' => $data['f_bpjs_kesehatan_member_no'][$item],
                );
                // dd($data2);
                Family::create($data2);
            }
        }

        //Create Bio

        $dataBio = [
            'id_user' => $data['id_user'],
            'id_dept' => $data['id_dept'],
            'leaveperyear' => $data['leaveperyear'],
            'nip' => $data['nip'],
            'photo' => $data['photo'],
            'join_date' => $data['join_date'],
            'status' => $data['status'],
            'adress' => $data['adress'],
            'no_ktp' => $data['no_ktp'],
            'birth_date' => $data['birth_date'],
            'mobile_phone' => $data['mobile_phone'],
            'bank_name' => $data['bank_name'],
            'account_name' => $data['account_name'],
            'account_number' => $data['account_number'],
            'tax_status' => $data['tax_status'],
            'bpjs_ketenagakerjaan_member_no' => $data['bpjs_ketenagakerjaan_member_no'],
            'bpjs_kesehatan_member_no' => $data['bpjs_kesehatan_member_no'],
            'npwp' => $data['npwp'],
            'health_insurance_number' => $data['health_insurance_number'],
        ];

        $validator = Validator::make($dataBio,[
                'photo' => 'required|image|mimes:jpeg,jpg,png|max:10240'
            ]);

        if($request->hasFile('photo'))
        {
            $destination_path = 'public/images/profile'; //path tempat penyimpanan (storage/public/images/profile)
            $image = $request -> file('photo'); //mengambil request column photo
            $image_name = $image->getClientOriginalName(); //memberikan nama gambar yang akan disimpan di foto
            $path = $request->file('photo')->storeAs($destination_path, $image_name); //mengirimkan foto ke folder store
            $dataBio['photo'] = $image_name; //mengirimkan ke database
        }

        Biodata::create($dataBio);

        //update status biodata si user
        $user = User::find($id);
        $user->update([
            'biodata' => 'true',
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
        $bio = Biodata::find($id);

        $total_leave = LeavePermit::where('id_luser', $bio->id_user)->sum('total_leave');
        $annual_limit = $bio->sum('leaveperyear');

        $result = $annual_limit - $total_leave;

        $family = Family::where('id_fuser', $bio->id_user)->get()->all();
        return view('biodata.biodata-detail', compact('bio', 'family', 'result'));
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
        $family = Family::where('id_fuser', $bio->id_user)->get()->all();
        $dept = Dept::all();
        return view('biodata.biodata-edit', compact('bio', 'dept', 'family'));
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
        $bio = Biodata::find($id);

        //Create Family

        $data = $request->all();
        // dd($data);

       Family::where('id_fuser', $bio->user->id)->delete();
       
       if($request->fname){
            foreach ($data['fname'] as $item => $value) {
                $data2 = array(
                    'id_fuser' => $data['id_fuser'][$item],
                    'fname' => $data['fname'][$item],
                    'gender' => $data['gender'][$item],
                    'relation' => $data['relation'][$item],
                    'dob' => $data['dob'][$item],
                    'f_bpjs_kesehatan_member_no' => $data['f_bpjs_kesehatan_member_no'][$item],
                );
                Family::create($data2);
            }
        }

        //Create Bio

        if($request->hasFile('photo')){
            $dataBio = [
                'id_user' => $data['id_user'],
                'id_dept' => $data['id_dept'],
                'leaveperyear' => $data['leaveperyear'],
                'nip' => $data['nip'],
                'photo' => $data['photo'],
                'join_date' => $data['join_date'],
                'adress' => $data['adress'],
                'no_ktp' => $data['no_ktp'],
                'birth_date' => $data['birth_date'],
                'mobile_phone' => $data['mobile_phone'],
                'bank_name' => $data['bank_name'],
                'account_name' => $data['account_name'],
                'account_number' => $data['account_number'],
                'tax_status' => $data['tax_status'],
                'bpjs_ketenagakerjaan_member_no' => $data['bpjs_ketenagakerjaan_member_no'],
                'bpjs_kesehatan_member_no' => $data['bpjs_kesehatan_member_no'],
                'npwp' => $data['npwp'],
                'health_insurance_number' => $data['health_insurance_number'],
            ];
        } else {
            $dataBio = [
                'id_user' => $data['id_user'],
                'id_dept' => $data['id_dept'],
                'leaveperyear' => $data['leaveperyear'],
                'nip' => $data['nip'],
                'join_date' => $data['join_date'],
                'adress' => $data['adress'],
                'no_ktp' => $data['no_ktp'],
                'birth_date' => $data['birth_date'],
                'mobile_phone' => $data['mobile_phone'],
                'bank_name' => $data['bank_name'],
                'account_name' => $data['account_name'],
                'account_number' => $data['account_number'],
                'tax_status' => $data['tax_status'],
                'bpjs_ketenagakerjaan_member_no' => $data['bpjs_ketenagakerjaan_member_no'],
                'bpjs_kesehatan_member_no' => $data['bpjs_kesehatan_member_no'],
                'npwp' => $data['npwp'],
                'health_insurance_number' => $data['health_insurance_number'],
            ];
        }
        

        $validator = Validator::make($dataBio,[
                'photo' => 'required|image|mimes:jpeg,jpg,png|max:10240'
        ]);

        if($request->hasFile('photo'))
        {
            $destination_path = 'public/images/profile'; //path tempat penyimpanan (storage/public/images/profile)
            $image = $request -> file('photo'); //mengambil request column photo
            $image_name = $image->getClientOriginalName(); //memberikan nama gambar yang akan disimpan di foto
            $path = $request->file('photo')->storeAs($destination_path, $image_name); //mengirimkan foto ke folder store
            $dataBio['photo'] = $image_name; //mengirimkan ke database
        }

        $bio->update($dataBio);

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
