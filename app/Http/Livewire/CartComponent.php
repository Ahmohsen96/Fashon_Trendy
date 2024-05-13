<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product=Cart::get($rowId);
        $qty=$product->qty +1 ;
        Cart::update($rowId, $qty);
        $this->emitTo('cart-icon-component','refreshComponent');


    }

    public function decreaseQuantity($rowId)
    {
        $product=Cart::get($rowId);
        $qty=$product->qty - 1 ;
        Cart::update($rowId, $qty);
        $this->emitTo('cart-icon-component','refreshComponent');

    }
    public function destroy($id)
    {
        Cart::remove($id);
        $this->emitTo('cart-icon-component','refreshComponent');
        session()->flash('success_message','Item have been removed');
        // $this->emitTo('cart-icon-component','refreshComponent');

    }
    public function clearAll()
    {
        Cart::destroy();
        $this->emitTo('cart-icon-component','refreshComponent');

    }
        // first step in check out
    public function checkout()
    {
       if(Auth::check()){
        return redirect()->route('shop.checkout');
       } else {
        return redirect()->route('login');

       }
    }

    public function SetAmountForCheckout(){

        if(!Cart::count()> 0){
            session()->forget('checkout');
            return;
        }

        if(session()->has('coupon')){
            session()->put('checkout',[
                'discount'=>$this->discount,
                'subtotal'=>$this->subtotalAfterDiscount,
                'tax'=>$this->taxAfterDiscount,
                'total'=>$this->totalAfterDiscount,

            ]);
        }
        else
        {
            session()->put('checkout',[
            'discount'=>0,
            'subtotal'=>Cart::subtotal(),
            'tax'=>Cart::tax(),
            'total'=>Cart::total(),


        ]);
    }

    }





    public function render()
    {
        $this->SetAmountForCheckout();
        return view('livewire.cart-component');
    }
}
