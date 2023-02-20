<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dept;

class DeptController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $dept = Dept::all();
        return view('departement.index', compact('dept'));
    }

    public function save(Request $request) {
        $input = $request->all();
        Dept::create($input);
        return back();
    }

    public function destroy($id) {
        $data = Dept::find($id);
        $data->delete();
        return back();
    }

    public function edit($id) {
        $dept = Dept::findOrFail($id);
        return view('departement.edit-dept', compact('dept'));
    }

    public function update(Request $request, $id) {
        $dept = Dept::findOrFail($id);
        $data = $request->all();
        $dept->update($data);
        return redirect('/departement');
    }
}
