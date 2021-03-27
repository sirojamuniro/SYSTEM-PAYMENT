<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment\Payment;
use App\Models\Payment\PaymentStatus;
use Illuminate\Http\Request;
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
        $create = $request->input('payment_method');

        $result = Payment::firstOrCreate(['payment_method'=>$create]);

        return $this->handleResponse(200,'success',$result);

    }

    public function update(PaymentRequest $request,$id)
    {
        $find = Payment::find($id);

        $update = $request->input('payment_method');

        $find->update(['payment_method'=>$update]);

        return $this->handleResponse(200,'success',$find);

    }

    public function delete($id)
    {
        $find = Payment::findOrFail($id);

        $find->delete();

        return $this->handleResponse(200,'success',$find);

    }

    public function deleteWithQueues($id)
    {
        $paymentJob = (new delete());
        dispatch($paymentJob);
        echo "send mail with queues";

    }
}
