<?php

namespace App\Http\Controllers;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'id_customers' => 'required',
                'id_petugas' => 'required'
            ]
        );
        if($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $simpan = Orders::create([
            'id_customers' => $request->id_customers,
            'id_petugas' => $request->id_petugas,
            'tgl_transaksi' => date("Y-m-d")
        ]);
        if($simpan)
        {
            return Response()->json(['status' => 1]);
        }
        else {
            return Response()->json(['status' => 0]);
        }
    }
}
