<?php

namespace App\Http\Controllers\API;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $id_prodi = $request->input('id_prodi');
        $status = $request->input('status');

        if ($id) {
            $transaction = Transaksi::with(['prodi', 'user'])->find($id);

            if ($transaction)
                return ResponseFormatter::success(
                    $transaction,
                    'Data transaksi berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data transaksi tidak ada',
                    404
                );
        }

        $transaksi = Transaksi::with(['prodi', 'user'])->where('id_user', Auth::user()->id);

        if ($id_prodi)
            $transaksi->where('id_prodi', $id_prodi);

        if ($status)
            $transaksi->where('status', $status);

        return ResponseFormatter::success(
            $transaksi->paginate($limit),
            'Data list transaksi berhasil diambil'
        );
    }

    //update
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $transaksi->update($request->all());

        return ResponseFormatter::success($transaksi, 'Transaksi berhasil diperbarui');
    }

    // transaksi
    public function checkout(Request $request)
    {
        $request->validate([
            'id_prodi' => 'required|exists:prodi,id',
            'id_user' => 'required|exists:users,id',
            'quantity' => 'required',
            'total' => 'required',
            'status' => 'required',
        ]);

        $transaksi = Transaksi::create([
            'id_prodi' => $request->id_prodi,
            'id_user' => $request->id_user,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'status' => $request->status,
            'payment_url' => ''
        ]);

        // Konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $transaksi = Transaksi::with(['prodi', 'user'])->find($transaksi->id);

        $midtrans = array(
            'transaction_details' => array(
                'order_id' =>  $transaksi->id,
                'gross_amount' => (int) $transaksi->total,
            ),
            'customer_details' => array(
                'first_name'    => $transaksi->user->name,
                'email'         => $transaksi->user->email
            ),
            'enabled_payments' => array('gopay', 'bank_transfer'),
            'vtweb' => array()
        );

        try {
            // Ambil halaman payment midtrans
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            $transaksi->paylink = $paymentUrl;
            $transaksi->save();

            // Redirect ke halaman midtrans
            return ResponseFormatter::success($transaksi, 'Transaksi berhasil');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 'Transaksi Gagal');
        }
    }
}