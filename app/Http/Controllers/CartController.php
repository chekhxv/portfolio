<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Car;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $service_id = $request->input('service_id');
        $product_id = $request->input('product_id');
    
        if ($service_id) {
            $service = Service::find($service_id);
            \Gloudemans\Shoppingcart\Facades\Cart::add('s_' . $service_id, $service->name, 1, floatval($service->price));
        }
    
        if ($product_id) {
            $product = Product::find($product_id);
            \Gloudemans\Shoppingcart\Facades\Cart::add('p_' . $product_id, $product->name, 1, floatval($product->price));
        }
    
        return redirect()->back()->with('success', 'Товар успешно добавлен в корзину');
    }

    public function show()
    {
        $services = Service::all();
        $products = Product::all();
        $cars = Car::all();
        $cartContent = \Gloudemans\Shoppingcart\Facades\Cart::content();
        return view('Cart.index', compact('services', 'products', 'cars', 'cartContent'));
    }

    public function remove($rowId)
    {
        \Gloudemans\Shoppingcart\Facades\Cart::remove($rowId);
        return redirect()->back()->with('success', 'Элемент успешно удален из корзины');
    }

    public function clear()
    {
        \Gloudemans\Shoppingcart\Facades\Cart::destroy();
        return redirect()->back()->with('success', 'Корзина успешно очищена');
    }
    public function checkout(Request $request)
    {
        $user = auth()->user();
        $cartContent = \Gloudemans\Shoppingcart\Facades\Cart::content();
        $totalCost = \Gloudemans\Shoppingcart\Facades\Cart::total();
    
        $order = new Order();
        $order->user_id = $user->id;
        $order->car_id = $request->input('car'); // Установка car_id из запроса
        $order->total_cost = $totalCost;
        $order->status = 'pending';
        $order->save();
    
        foreach ($cartContent as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->item_type = (strpos($item->id, 's_') === 0) ? 'service' : 'product';
            $orderItem->item_id = substr($item->id, 2);
            $orderItem->quantity = $item->qty;
            $orderItem->price = $item->price;
            $orderItem->save();
    
            // Установка service_id или product_id для заказа
            if ($orderItem->item_type == 'service') {
                $order->service_id = $orderItem->item_id;
            } else {
                $order->product_id = $orderItem->item_id;
            }
        }
    
        // Сохранение заказа после установки service_id и product_id
        $order->save();
    
        \Gloudemans\Shoppingcart\Facades\Cart::destroy();
    
        return redirect()->route('order.confirmation')->with('success', 'Заказ успешно оформлен');
    }
    
    

}
