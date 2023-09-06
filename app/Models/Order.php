<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Отношение с моделью Car
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function car()
    {
        return $this->belongsTo('App\Models\Car', 'car_id');
    }

    // Отношение с моделью Service
    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id');
    }

    // Отношение с моделью Product
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
