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

    public function is_payment_va()
    {
        return $this->payment_channel != null && $this->payment_channel->payment_method == 'va';
    }
}
