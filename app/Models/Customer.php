<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;
    
    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function PaymentConfirmation()
    {
        return $this->hasMany(PaymentConfirmation::class);
    }
}
