<?php

namespace App\Http\Controllers;
use App\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PetugasController extends Controller
{
    public function show()
    {
        return Petugas::all();
    }
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'nama_petugas' => 'required',
                'username' => 'required',
                'password' => 'required',
                'level' => 'required'
            ]
        );
        if($validator->fails()) {
            return Response()->json($validator->errors());
        }
        $simpan = Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => $request->password,
            'level' => $request->level
        ]);
        if($simpan) {
            return Response()->json(['status'=>1]);
        }
        else {
            return Response()->json(['status'=>0]);
        }
    }
}
