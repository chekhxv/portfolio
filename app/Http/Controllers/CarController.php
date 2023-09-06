<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car; 

class CarController extends Controller
{
    public function index()
    {
        // Получение всех машин из базы данных
        $cars = Car::all();

        // Передача данных о машинах в представление
        return view('cart.index', compact('cars'));
    }
}
