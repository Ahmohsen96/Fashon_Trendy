<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;
    public $pageSize=12;
    public $orderBy='Defult Sorting';

    public $min_value=0;
    public $max_value=4500;

    public function store($product_id,$product_name,$product_price)
    {

        Cart::add($product_id,$product_name,1,$product_price)->associate('\App\Models\product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('shop.cart');
    }
    public function changePageSize($size){
        $this->pageSize=$size;
    }
    public function changeOrderBy($order){
        $this->orderBy=$order;
    }


    public function render()
    {
        if($this->orderBy == 'Price: Low to High')
        {
            $products = product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Price: High to Low')
        {
            $products = product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('regular_price','DESC')->paginate($this->pageSize);
        }
        else if($this->orderBy == 'sort by Newness')
        {
            $products = product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        else{
            $products = product::whereBetween('regular_price',[$this->min_value,$this->max_value])->paginate($this->pageSize);
        }

     $categories=Category::orderBy('name','ASC')->get();
     $lproducts=product::orderBy('created_at','DESC')->get()->take(8);

    return view('livewire.shop-component',['products'=>$products,'categories'=>$categories,'lproducts'=>$lproducts]);
   }
}
