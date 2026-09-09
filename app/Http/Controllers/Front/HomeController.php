<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PaymentChannel;
use App\Helpers\Payment;

use Validator;
use DB;

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

        DB::beginTransaction();
        try {

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
        
        Payment::initial($request->all())->pay();
    }
}
