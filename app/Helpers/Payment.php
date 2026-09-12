<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Str;

class Payment {

    private $provider;
    private $transaction;
    private $url;
    private $key;
    private $secret;

    public static function initial($transaction) 
    {
        return new Payment($transaction);
    }

    public function __construct($transaction) 
    {
        $this->url = config('services.xendit.url');
        $this->key = config('services.xendit.key');
        $this->secret = config('services.xendit.secret');
        $this->transaction = $transaction;
    }

    public function pay() 
    {
        if ($this->transaction->payment_channel->provider == 'xendit') {
            return $this->xenditPay();
        }
    }

    private function authHeader()
    {
        return base64_encode($this->secret.':');
    }

    private function xenditPay()
    {
        $transaction = $this->transaction;
        $body = [
            'reference_id' => $transaction->order_no,
            'type' => 'PAY',
            'country' => 'ID',
            'currency' => 'IDR',
            'channel_code' => $transaction->payment_channel->channel_code,
            'request_amount' => (int) $transaction->price,
            'channel_properties' => [
                'display_name' => $transaction->name,
                'account_mobile_number' => '+'.$transaction->phone,
                'expires_at' => Carbon::parse($transaction->expired_at)->toIso8601String()
            ]
        ];

        $response = Http::acceptJson()->withHeaders([
            'Authorization' => 'Basic '.$this->authHeader(),
            'api-version' => '2024-11-11',
            'Content-Type' => 'application/json'
        ])->post($this->url.'/payment_requests', $body);
        
        if ($response->status() != 201) {
            \Log::debug($response->json());
            \Log::debug($body);
            return false;
        }

        \Log::debug($response->json());
        $obj_response = $response->object();
        $transaction->provider_reference_number = $obj_response->payment_request_id;

        if (in_array($transaction->payment_channel->channel_code, ['MANDIRI_VIRTUAL_ACCOUNT'])) {
            $transaction->account_number = $obj_response->actions[0]->value;
        }
        $transaction->save();

        return true;
    }

}