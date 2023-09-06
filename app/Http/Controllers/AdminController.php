<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::all();
        $cars = Car::all();
    
        $users = User::with('orders.orderItems')->get();
        $users->each(function ($user) {
            $user->total_cost = $user->orders->sum(function ($order) {
                return $order->orderItems->sum('price');
            });
        });
    
        $popularServices = DB::table('orders')
            ->join('services', 'orders.service_id', '=', 'services.id')
            ->select('services.name', DB::raw('count(*) as order_count'))
            ->groupBy('services.name')
            ->orderBy('order_count', 'desc')
            ->get();
    
        return view('admin', [
            'services' => $services,
            'cars' => $cars,
            'users' => $users,
            'popularServices' => $popularServices,
            'clients' => null
        ]);
    }
    
    
    
    public function getClientsByService(Request $request)
    {
        $request->validate(['service_id' => 'required|integer']);
        
        $serviceId = $request->service_id;
        $clients = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->join('services', 'services.id', '=', 'orders.service_id')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->where('services.id', '=', $serviceId)
            ->select('users.name', 'services.name as service_name', 'order_items.item_type as item_type')
            ->get();
    
        return response()->json($clients);
    }
    public function getServicesByCost(Request $request)
    {
        $request->validate(['cost' => 'required|numeric']);
        
        $services = Service::all();
        $cars = Car::all();
        $users = User::with(['orders.car', 'orders.service', 'orders.product'])->get();
        $popularServices = DB::table('orders')
            ->join('services', 'orders.service_id', '=', 'services.id')
            ->select('services.name', DB::raw('count(*) as order_count'))
            ->groupBy('services.name')
            ->orderBy('order_count', 'desc')
            ->get();

        $servicesByCost = null;
        if ($request->has('cost')) {
            $cost = $request->input('cost');
            $servicesByCost = Service::where('price', '>', $cost)->get();
        }

        return view('admin', [
            'services' => $services,
            'cars' => $cars,
            'users' => $users,
            'popularServices' => $popularServices,
            'servicesByCost' => $servicesByCost
        ]);
    }

    public function getClientsByCar(Request $request)
    {
        $request->validate(['car_make' => 'required|string']);
        
        $carMake = $request->car_make;
        
        $users = User::whereHas('orders.car', function ($query) use ($carMake) {
            $query->where('make', '=', $carMake);
        })->with(['orders.car', 'orders.service'])->get();
        
        return response()->json($users);
    }

    public function getServicesSortedByCost()
    {
        $services = Service::orderBy('price', 'asc')->get();
        return response()->json($services);
    }

    public function getAllCars()
    {
        $cars = Car::all();
        return response()->json($cars);
    }
    public function getServicesByCar(Request $request)
    {
        $request->validate(['car_id' => 'required|integer']);
        
        $carId = $request->car_id;
        $services = DB::table('services')
            ->join('orders', 'services.id', '=', 'orders.service_id')
            ->join('cars', 'orders.car_id', '=', 'cars.id')
            ->where('cars.id', '=', $carId)
            ->select('services.name')
            ->get();
        
        return response()->json($services);
    }
    public function updateService(Request $request)
    {
        $request->validate([
            'service_id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $service = Service::findOrFail($request->service_id);
        $service->name = $request->name;
        $service->price = $request->price;
        $service->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
            $service->image = $imagePath;
        }

        if ($service->save()) {
            // Возвращаем обновленную модель услуги
            return response()->json(['service' => $service, 'message' => 'Услуга успешно обновлена']);
        } else {
            // Если возникла ошибка при сохранении услуги
            return response()->json(['message' => 'Ошибка при сохранении услуги'], 500);
        }
    }
}
