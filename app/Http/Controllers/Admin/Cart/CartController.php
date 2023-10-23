<?php

namespace App\Http\Controllers\Admin\Cart;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function buy()
    {
        $bool = false;
        $price = 0;
        $qwert = Auth::user()->giftsWithStatus('in_cart')->get();
        foreach ($qwert as $q) {
            $price += $q->pivot->number * $q->price;
        }
        foreach ($qwert as $q) {
            if ($q->pivot->number != 0 && $price <= Auth::user()->my_balance) {
                $bool = true;
            }
        }
        if ($bool) {
            $ids = Auth::user()->giftsWithStatus('in_cart')->allRelatedIds();
            foreach ($ids as $id) {
                Auth::user()->giftsWithStatus('in_cart')->updateExistingPivot($id, ['status' => 'ordered']);
            }
            Auth::user()->update(['my_balance' => Auth::user()->my_balance - $price]);
            return back()->with('message', __('cart.your carts successfully sended'));
        }
        return back()->withErrors(__('you don`t have enough money'));

    }

    public function index()
    {
        $giftsInCart = Auth::user()->giftsWithStatus('in_cart')->where('number', '>', 0)->get();
        $giftsIsNull = Auth::user()->giftsWithStatus('in_cart')->where('number', '<=', 0)->get();
        for ($i = 0; $i < count($giftsIsNull); $i++) {
            if ($giftsIsNull[$i]->pivot->number <= 0 && $giftsIsNull[$i] != null) {
                $this->deleteFromCart($giftsIsNull[$i]);
                return back();
            }
        }
        $total = 0;
        for ($i = 0; $i < count($giftsInCart); $i++) {
            $total = $total + $giftsInCart[$i]->price * $giftsInCart[$i]->pivot->number;
        }
        for ($i = 0; $i < count($giftsInCart); $i++) {
            if ($giftsInCart[$i]) {
                return view('cart.index', ['giftsInCart' => $giftsInCart, 'total' => $total]);
            }
        }
        return view('cart.index', ['giftsInNull' => true]);
    }

    public function putToCart(Gift $gift)
    {
        $giftsInCart = Auth::user()->giftsWithStatus('in_cart')->where('gift_id', $gift->id)->first();
        if ($giftsInCart != null)
            Auth::user()->giftsWithStatus('in_cart')
                ->updateExistingPivot($gift->id,
                    ['number' => $giftsInCart->pivot->number + 1]);
        else
            Auth::user()->giftsWithStatus('in_cart')
                ->attach($gift->id, ['number' => 1]);

        return redirect()->route('cart.index')->with('message', __('session.cart to successfully added'));
    }

    public function removecart(Gift $gift)
    {
        $giftsInCart = Auth::user()->giftsWithStatus('in_cart')->where('gift_id', $gift->id)->first();
        if ($giftsInCart != null)
            Auth::user()->giftsWithStatus('in_cart')->updateExistingPivot($gift->id,
                ['number' => $giftsInCart->pivot->number - 1]);
        else
            Auth::user()->giftsWithStatus('in_cart')->attach($gift->id,
                ['number' => 1]);

        return redirect()->route('cart.index')->with('message', __('session.cart to successfully deleted'));
    }

    public function deleteFromCart(Gift $gift)
    {
        $giftsBought = Auth::user()->giftsWithStatus('in_cart')
            ->where('gift_id', $gift->id)->first();
        if ($giftsBought != null)
            Auth::user()->giftsWithStatus('in_cart')->detach($gift->id);
        return back()->with('message', __('session.cart to successfully deleted'));
    }

    public function deleteallcart()
    {
        $giftsBought = Auth::user()->giftsWithStatus('in_cart')->get();
        if ($giftsBought != null)
            Auth::user()->giftsWithStatus('in_cart')->detach();
        return redirect()->route('cart.index')->with('message', 'session.cart to successfully deleted');
    }

}
