<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\product;
use Cart;
use Livewire\Component;


class HomeComponent extends Component

{
    public function store($product_id,$product_name,$product_price)
    {

        Cart::add($product_id,$product_name,1,$product_price)->associate('\App\Models\product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        $slides=HomeSlider::where('status',1)->get();
        $lproducts=product::orderBy('created_at','DESC')->get()->take(3);
        $fproducts=Product::where('featured',1)->inRandomOrder()->get()->take(4);
        $sproducts=Product::where('sale_price','>',0)->inRandomOrder()->get()->take(4);
        $categories=Category::orderBy('name','ASC')->get();

           // Increment views for popular products
           $popularProducts = Product::orderBy('views', 'desc')->take(4)->get();
           foreach ($popularProducts as $product) {
               $product->increment('views');
           }

        return view('livewire.home-component',['slides'=>$slides,'lproducts'=>$lproducts,'fproducts'=>$fproducts,'categories'=>$categories,'sproducts'=>$sproducts,'popularProducts'=>$popularProducts]);

    }
}
