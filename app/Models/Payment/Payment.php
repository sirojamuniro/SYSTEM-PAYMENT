<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'payments';

    protected $keyType = 'uuid';

    public $incrementing = false;

    protected $hidden = ['deleted_at'];

    protected $fillable = [
        'id',
    	'id_payment_status',
    	'payment_method',
    	'total_price',
    ];
}
