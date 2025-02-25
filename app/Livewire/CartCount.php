<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CartCount extends Component
{
    protected $listeners = ['cartUpdated' => 'updateCartCount'];

    public $count = 0;

    public function mount()
    {
        $this->updateCartCount();
    }

    public function updateCartCount()
    {
        // Предположим, что корзина хранится в сессии (или можно использовать базу данных)
        $cart = Session::get('cart', []);
        $this->count = collect($cart)->sum('quantity'); // Считаем общее количество товаров
    }

    public function render()
    {
        return view('livewire.cart-count');
    }
}
