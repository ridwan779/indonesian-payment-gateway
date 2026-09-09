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
                'channel_code' => 'OVO'
            ],
            [
                'name' => 'QRIS - Xendit',
                'provider' => 'xendit',
                'channel_code' => 'QRIS'
            ],
            [
                'name' => 'Dana - Xendit',
                'provider' => 'xendit',
                'channel_code' => 'DANA'
            ],
            [
                'name' => 'Mandiri VA - Xendit',
                'provider' => 'xendit',
                'channel_code' => 'MANDIRI_VIRTUAL_ACCOUNT'
            ],
        ]);
    }
}
