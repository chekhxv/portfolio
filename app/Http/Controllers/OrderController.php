<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Cart;

class OrderController extends Controller
{
    public function confirmation()
    {
        return view('confirmation');
    }
}
