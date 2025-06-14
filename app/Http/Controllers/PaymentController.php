<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function checkout($slug)
    {
        $user = Auth::user();
        $program = Program::where('slug', $slug)->firstOrFail();

        // Generate order_id manual untuk disimpan
        $orderId = 'ORDER-' . uniqid();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $program->harga_normal,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone_number,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('payment.checkout', compact('program', 'user', 'snapToken', 'orderId'));
    }
    
    public function placeOrder(Request $request)
    {
        $user = Auth::user();
        $program = Program::findOrFail($request->program_id);
        $payment = $request->payment_result;

        $status = isset($payment['transaction_status']) && $payment['transaction_status'] === 'settlement' ? 'paid' : 'pending';
        $deliveryStatus = $status === 'paid' ? 'sedang diproses' : null;

        $order = Order::create([
            'user_id' => $user->id,
            'nama_program' => $program->nama_program,
            'jumlah' => $request->jumlah ?? 1,
            'catatan' => $request->catatan,
            'harga_normal' => $program->harga_normal,
            'total_harga' => ($program->harga_normal) * ($request->jumlah ?? 1),
            'alamat' => $user->address ?? 'Alamat belum diisi',
            'status' => $status,
            'delivery_status' => $deliveryStatus,
            'midtrans_order_id' => $payment['order_id'] ?? null,
        ]);

        return response()->json(['message' => 'Order created']);
    }
    
    public function success()
    {
        return view('payment.success');
    }

    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function createCharge(Request $request)
    {
        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => $request->amount,
            ],
            'customer_details' => [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        return response()->json($snapToken);
    }
}