<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment\PaymentStatus;
use Faker\Generator as Faker;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentStatus::insert([
            'id'=>1,
            'name' => "OPEN",
            'description'=> "Berhasil Bayar, Mohon Tunggu konfirmasi",
        ]);
        PaymentStatus::insert([
            'id'=>2,
            'name' => "PAID",
            'description'=> "Sudah Berhasil Dibayarkan dan Diterima ",
        ]);
        PaymentStatus::insert([
            'id'=>3,
            'name' => "CANCEL",
            'description'=> "Gagal Pembayaran",
        ]);
    }
}
