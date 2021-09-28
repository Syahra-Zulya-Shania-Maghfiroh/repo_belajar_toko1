<?php

namespace App\Http\Controllers;
use App\Detail_Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class Detail_OrdersController extends Controller
{
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'id_orders' => 'required',
                'id_product' => 'required',
                'qty' => 'required'
            ]
        );
        if($validator->fails()) {
            return Response()->json($validator->errors());
        }
        
        $id_product = $request->id_product;
        $qty = $request->qty;
        $harga = DB::table('product')->where('id_product', $id_product)->value('harga');
        $subtotal = $harga * $qty;

        $simpan = Detail_Orders::create([
            'id_orders' => $request->id_orders,
            'id_product' => $request->id_product,
            'qty' => $qty,
            'subtotal'=>$subtotal
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
