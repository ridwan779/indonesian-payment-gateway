<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class PaymentChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_channels')->insert([
            [
                'name' => 'OVO - Xendit',
                'provider' => 'xendit',
                'payment_method' => 'ewallet',
                'channel_code' => 'OVO'
            ],
            [
                'name' => 'QRIS - Xendit',
                'provider' => 'xendit',
                'channel_code' => 'QRIS',
                'payment_method' => 'qr',
            ],
            [
                'name' => 'Dana - Xendit',
                'provider' => 'xendit',
                'channel_code' => 'DANA',
                'payment_method' => 'ewallet',
            ],
            [
                'name' => 'Mandiri VA - Xendit',
                'provider' => 'xendit',
                'channel_code' => 'MANDIRI_VIRTUAL_ACCOUNT',
                'payment_method' => 'va',
            ],
        ]);
    }
}
