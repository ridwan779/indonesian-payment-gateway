<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\PaymentChannel;

class Transaction extends Model
{
    public function payment_channel()
    {
        return $this->belongsTo(PaymentChannel::class, 'payment_channel_id');
    }
}
