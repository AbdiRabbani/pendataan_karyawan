<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title;

class TitleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $title = Title::all();
        return view('title.index', compact('title'));
    }

    public function save(Request $request) {
        $input = $request->all();
        Title::create($input);
        return back();
    }

    public function destroy($id) {
        $data = Title::find($id);
        $data->delete();
        return back();
    }

    public function edit($id) {
        $title = Title::findOrFail($id);
        return view('title.edit-title', compact('title'));
    }

    public function update(Request $request, $id) {
        $title = Title::findOrFail($id);
        $data = $request->all();
        $title->update($data);
        return redirect('/title');
    }
}
