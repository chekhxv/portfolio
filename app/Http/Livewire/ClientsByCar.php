<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class ClientsByCar extends Component
{
    public $carMake;

    public function render()
    {
        $users = [];

        if ($this->carMake) {
            $users = User::whereHas('orders.car', function ($query) {
                $query->where('make', '=', $this->carMake);
            })->with('orders.car')->get();
        }

        return view('livewire.clients-by-car', ['users' => $users]);
    }
}
