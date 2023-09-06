<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function orderItems()
    {
        return $this->morphMany(OrderItem::class, 'item');
    }
    
}
