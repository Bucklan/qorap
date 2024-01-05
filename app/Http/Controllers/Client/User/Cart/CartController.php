<?php

namespace App\Http\Controllers\Client\User\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function buy()
    {
        $bool = false;
        $price = 0;
        $qwert = Auth::user()->productsWithStatus('in_cart')->get();
        foreach ($qwert as $q) {
            $price += $q->pivot->number * $q->price;
        }
        foreach ($qwert as $q) {
            if ($q->pivot->number != 0 && $price <= Auth::user()->my_balance) {
                $bool = true;
            }
        }
        if ($bool) {
            $ids = Auth::user()->productsWithStatus('in_cart')->allRelatedIds();
            foreach ($ids as $id) {
                Auth::user()->productsWithStatus('in_cart')->updateExistingPivot($id, ['status' => 'ordered']);
            }
            Auth::user()->update(['my_balance' => Auth::user()->my_balance - $price]);
            return back()->with('message', __('cart.your carts successfully sended'));
        }
        return back()->withErrors(__('you don`t have enough money'));

    }

    public function index()
    {
        $qwe = Auth::user()->cart()->get();

//        $productsInCart = Auth::user()->productsWithStatus('in_cart')->where('number', '>', 0)->get();
//        $productsIsNull = Auth::user()->productsWithStatus('in_cart')->where('number', '<=', 0)->get();
//        for ($i = 0; $i < count($productsIsNull); $i++) {
//            if ($productsIsNull[$i]->pivot->number <= 0 && $productsIsNull[$i] != null) {
//                $this->deleteFromCart($productsIsNull[$i]);
//                return back();
//            }
//        }
//        $total = 0;
//        for ($i = 0; $i < count($productsInCart); $i++) {
//            $total = $total + $productsInCart[$i]->price * $productsInCart[$i]->pivot->number;
//        }
//        for ($i = 0; $i < count($productsInCart); $i++) {
//            if ($productsInCart[$i]) {
//                return view('cart.index', ['productsInCart' => $productsInCart, 'total' => $total]);
//            }
//        }
//        return view('livewire.frontend.carts.index', compact('qwe'));
    }

    public function putToCart(Product $product)
    {
        $productsInCart = Auth::user()->productsWithStatus('in_cart')->where('product_id', $product->id)->first();
        if ($productsInCart != null)
            Auth::user()->productsWithStatus('in_cart')
                ->updateExistingPivot($product->id,
                    ['number' => $productsInCart->pivot->number + 1]);
        else
            Auth::user()->productsWithStatus('in_cart')
                ->attach($product->id, ['number' => 1]);

        return redirect()->route('cart.index')->with('message', __('session.cart to successfully added'));
    }

    public function removecart(Product $product)
    {
        $productsInCart = Auth::user()->productsWithStatus('in_cart')->where('product_id', $product->id)->first();
        if ($productsInCart != null)
            Auth::user()->productsWithStatus('in_cart')->updateExistingPivot($product->id,
                ['number' => $productsInCart->pivot->number - 1]);
        else
            Auth::user()->productsWithStatus('in_cart')->attach($product->id,
                ['number' => 1]);

        return redirect()->route('cart.index')->with('message', __('session.cart to successfully deleted'));
    }

    public function deleteFromCart(Product $product)
    {
        $productsBought = Auth::user()->productsWithStatus('in_cart')
            ->where('product_id', $product->id)->first();
        if ($productsBought != null)
            Auth::user()->productsWithStatus('in_cart')->detach($product->id);
        return back()->with('message', __('session.cart to successfully deleted'));
    }

    public function deleteallcart()
    {
        $productsBought = Auth::user()->productsWithStatus('in_cart')->get();
        if ($productsBought != null)
            Auth::user()->productsWithStatus('in_cart')->detach();
        return redirect()->route('cart.index')->with('message', 'session.cart to successfully deleted');
    }

    public function create(\Illuminate\Http\Request $request)
    {
        $where = Auth::user()->cart()->where('product_id', $request->product_id)->first();

            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'city_id' => 1,
                'price' => $request->price
            ]);
        return redirect()->route('cart.index')->with('message', __('session.cart to successfully added'));
    }
}
