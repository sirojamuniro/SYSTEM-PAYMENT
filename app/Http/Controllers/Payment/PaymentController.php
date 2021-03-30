<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment\Payment;
use App\Models\Payment\PaymentStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Jobs\Payment\DeletePaymentJob;
use App\Http\Requests\Payment\PaymentRequest;

class PaymentController extends Controller
{
    public function index()
    {
        $result = Payment::paginate(10);

        return $this->handleResponse(200,'success',$result);

    }

    public function create(PaymentRequest $request)
    {
        $uuid = (string) Str::uuid();

        $create = $request->input('payment_method');

        $result = Payment::firstOrCreate(['id'=>$uuid,
                                        'id_payment_status'=> 1,
                                        'payment_method'=>$create]);

        $paidSecond = Payment::where('created_at','>',Carbon::now()->subSecond(5)->toDateTimeString())->update(['id_payment_status'=> 2]);
        $cancelSecond = Payment::where('created_at','>',Carbon::now()->subMinute(1)->toDateTimeString())->update(['id_payment_status'=> 3]);

        return $this->handleResponse(200,'success',$result);

    }

    public function update(PaymentRequest $request,$id)
    {
        $find = Payment::find($id);

        $update = $request->input('payment_method');

        $find->update(['payment_method'=>$update]);

        return $this->handleResponse(200,'success',$find);

    }

    public function delete(Request $request)
    {;

        $idQueue = $request->input('id');
        if (is_array($idQueue) && !empty($idQueue)) {
            Payment::delete();
        }
        foreach ($idQueue as $ids) {
            $job = (new DeletePaymentJob($ids))->delay(Carbon::now()->addSeconds(5));
            $jobId=dispatch($job);
        }


        // $queue = (new DeletePaymentJob)->delay(Carbon::now()->addSecods(1));
        // $queuePar = dispatch($queue);
        return $this->handleResponse(200,'success',$jobId);

    }

    public function deleteWithQueues($id)
    {

    }
}
