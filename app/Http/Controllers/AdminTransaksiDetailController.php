<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class AdminTransaksiDetailController extends Controller
{
    //
    function create(Request $request) 
    {
        //die('masuk');
        //dd ($request->all());
        $produk_id = $request->produk_id;
        $transaksi_id = $request->transaksi_id;

        $td =TransaksiDetail::whereProdukId($produk_id)->whereTransaksiId($transaksi_id)->first();

        $transaksi = Transaksi::find($transaksi_id);
        if($td == null) {

            $data = [
                'produk_id' => $produk_id,
                'produk_name' => $request->produk_name,
                'transaksi_id' => $transaksi_id,
                'qty' => $request->qty,
                'subtotal' => $request->subtotal,
            ];
            TransaksiDetail::create($data);

            $dt = [
                'total' => $request->subtotal + $transaksi->total,
            ];
            $transaksi->update($dt);
        }else {
            $data = [
                'qty' => $td->qty + $request->qty,
                'subtotal' => $request->subtotal + $td->subtotal,
            ];
            $td->update($data);

             $dt = [
                'total' => $request->subtotal + $transaksi->total,
            ];
            $transaksi->update($dt);
        }
        return redirect('/admin/transaksi/' . $transaksi_id . '/edit');
    }

    function delete() 
    {
        $id = request('id');
        $td = TransaksiDetail::find($id);
        
        $transaksi = Transaksi::find($td->transaksi_id);
        $data = [
            'total' => $transaksi->total - $td->subtotal,
        ];
        $transaksi->update($data);

        $td->delete();
        return redirect()->back();
    }

    function done($id) 
    {
        $transaksi = Transaksi::find($id);
        $data = [
            'status' => 'selesai'
        ];
        $transaksi->update($data);
        return redirect('/admin/transaksi');
    }
}