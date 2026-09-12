<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PaymentChannel;
use App\Models\Transaction;

use App\Helpers\Payment;

use Carbon\Carbon;
use Validator;
use DB;
use Str;

class HomeController extends Controller
{
    public function getIndex()
    {
        $payment_channels = PaymentChannel::get();

        return view('page.home', compact('payment_channels'));
    }

    public function postPaymentProcess(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'phone' => 'required|numeric|digits_between:9,13',
            'price' => 'required|integer|size:150000',
            'payment' => 'required|exists:payment_channels,id'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }

        $payment_channels = PaymentChannel::find($request->payment);

        $transaction = new Transaction;
        $transaction->payment_channel_id = $request->payment;
        $transaction->order_no = 'TRX-'.Str::random(10);
        $transaction->name = strip_tags($request->name);
        $transaction->phone = $request->phone;
        $transaction->price = $request->price;
        $transaction->expired_at = Carbon::now()->addMinutes(30);
        $transaction->save();
        
        $payment = Payment::initial($transaction)->pay();

        if (!$payment) {
            return redirect()->back()->withErrors(['payment' => ['payment errors']]);
        }

        return redirect(route('home.payment.pending', [$transaction->order_no]));
    }

    public function getPaymentPending($order_no)
    {
        $transaction = Transaction::where('order_no', $order_no)->firstOrFail();

        if ($transaction->status == 'pending') {
            return view('page.payment-pending', compact('transaction'));
        } else if ($transaction->status == 'success') {
            return view('page.payment-success');
        } else {
            return view('page.payment-failed');
        }

    }

}
