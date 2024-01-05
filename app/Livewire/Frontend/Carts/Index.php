<?php

namespace App\Livewire\Frontend\Carts;

use Livewire\Component;

class Index extends Component
{
    public $products;
    public $cities;
    public $items = [];
    public $total;

    public function incrementQuantity($index): void
    {
        $this->items[$index]['quantity']++;
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        // Logic to calculate total based on quantity
        // Example: Assuming each item has a price of 10
        $total = collect($this->items)->sum(function ($item) {
            return $item['quantity'] * 10; // Change 10 to your item price
        });

        // Emit an event to update the total on the frontend
//        $this->emit('updateTotal', $total);
    }


    public function updatedTotal($value)
    {
        $this->total = (int)$value;
    }

    public function mount()
    {
        $this->products = \Auth::user()->cart()->get();
        $this->cities = \App\Models\City::all();
        foreach ($this->products as $product) {
            $this->total += $product->price * $product->quantity;
        }
    }
    public function update($id)
    {
        $cart = \App\Models\Cart::where('product_id',$id)->where('user_id',\Auth::user()->id)->first();
        $cart->quantity = $this->quantity;
        $cart->save();
        $this->products = \Auth::user()->cart()->get();
//        $this->emit('cartUpdated');
    }

//    public function checkout()
//    {
//        $this->validate([
//            'city_id' => 'required',
//            'address' => 'required',
//            'phone' => 'required',
//        ]);
//        $order = \App\Models\Order::create([
//            'user_id' => \Auth::user()->id,
//            'city_id' => $this->city_id,
//            'address' => $this->address,
//            'phone' => $this->phone,
//            'total' => $this->total,
//        ]);
//        foreach ($this->products as $product) {
//            $order->products()->attach($product->id, ['quantity' => $product->quantity, 'price' => $product->price]);
//        }
//        $this->deleteAllCart();
//        $this->emit('orderCreated');
//    }

    public function deleteFromCart($id): void
    {
        $cart = \App\Models\Cart::where('product_id',$id)->where('user_id',\Auth::user()->id)->first();
        $cart->delete();
        $this->products = \Auth::user()->cart()->get();
//        $this->emit('cartUpdated');
    }

    public function delete_all_cart(): void
    {
        $carts = \Auth::user()->cart()->get();
        foreach ($carts as $cart) {
            $cart->delete();
        }
        $this->products = \Auth::user()->cart()->get();
//        $this->emit('cartUpdated');
    }
    public function render()
    {
        return view('livewire.frontend.carts.index')->layout('layouts.app');
    }
}
