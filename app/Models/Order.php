<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guardeed = [];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
