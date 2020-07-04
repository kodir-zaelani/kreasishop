<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentConfirmation extends Model
{
    protected $guardeed = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
