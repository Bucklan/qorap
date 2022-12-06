<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function buy()
    {
        $ids = Auth::user()->giftsWithStatus('in_cart')->allRelatedIds();
        foreach ($ids as $id) {
            Auth::user()->giftsWithStatus('in_cart')->updateExistingPivot($id, ['status' => 'ordered']);
        }
        return back();

    }

    public function index()
    {
        $giftsInCart = Auth::user()->giftsWithStatus('in_cart')->where('number', '>', 0)->get();
        $giftsIsNull = Auth::user()->giftsWithStatus('in_cart')->where('number', '<=', 0)->get();
        for ($i = 0; $i < count($giftsIsNull); $i++) {
            if ($giftsIsNull[$i]->pivot->number <= 0 && $giftsIsNull[$i] != null) {
                $this->deleteFromCart($giftsIsNull[$i]);
            }
        }
        for ($i = 0; $i < count($giftsInCart); $i++) {
            if ($giftsInCart[$i] == null) {
                return view('cart.index',['giftsInNull'=> true]);
            } else {
                return view('cart.index', ['giftsInCart' => $giftsInCart]);
            }
        }
    }

    public function putToCart(Gift $gift)
    {
        $giftsInCart = Auth::user()->giftsWithStatus('in_cart')->where('gift_id', $gift->id)->first();
        if ($giftsInCart != null)
            Auth::user()->giftsWithStatus('in_cart')->updateExistingPivot($gift->id,
                ['number' => $giftsInCart->pivot->number + 1]);
        else
            Auth::user()->giftsWithStatus('in_cart')->attach($gift->id,
                ['number' => 1]);

        return redirect()->route('cart.index');
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

        return redirect()->route('cart.index');
    }

    public function deleteFromCart(Gift $gift)
    {
        $giftsBought = Auth::user()->giftsWithStatus('in_cart')
            ->where('gift_id', $gift->id)->first();
        if ($giftsBought != null)
            Auth::user()->giftsWithStatus('in_cart')->detach($gift->id);
        return back();
    }
//    public function deleteallcart()
//    {
//        $giftsBought = Auth::user()->giftsWithStatus('in_cart')->get();
//        if ($giftsBought != null)
//            Auth::user()->giftsWithStatus('in_cart')->detach();
//    return redirect()->route('cart.index');
//    }

}
