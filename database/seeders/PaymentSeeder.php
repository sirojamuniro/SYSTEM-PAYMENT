<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment\Payment;
use Illuminate\Support\Str;
use Illuminate\Support\Integer;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;
use Carbon;
class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $id_payment_status = [1,2,3];
        $payment_method= ['mandiri_va', 'bni_va', 'bri_va', 'bca_va', 'credit_card'];

        $payment = Payment::firstOrCreate([
            'id' =>  Str::uuid(),
            'id_payment_status'=> Arr::random($id_payment_status),
            'payment_method'=> Arr::random($payment_method),
            'total_price'=>  rand(10000,1000000),
        ]);
    }
}
