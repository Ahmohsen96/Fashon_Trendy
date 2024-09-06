<?php

namespace App\Http\Livewire;

use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use Cart;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;

    public $pageSize = 12;
    public $orderBy = 'Default Sorting';
    public $min_value = 0;
    public $max_value = 4500;
    public $selectedColor;

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Item added in cart');
        return redirect()->route('shop.cart');
    }

    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function changeOrderBy($order)
    {
        $this->orderBy = $order;
    }

    public function render()
{
    // Base query to filter by price range
    $productsQuery = Product::whereBetween('regular_price', [$this->min_value, $this->max_value]);

    // Apply color filter if a color is selected
    if ($this->selectedColor) {
        $productsQuery->whereHas('attributeValues', function ($query) {
            $query->whereHas('productAttribute', function ($subQuery) {
                $subQuery->where('name', 'color');
            })->where('value', 'like', '%' . $this->selectedColor . '%');
        });
    }

    // Fetch available colors from attribute values
    $availableColors = AttributeValue::whereHas('productAttribute', function ($query) {
        $query->where('name', 'color');
    })->pluck('value')->unique();

    // Split the colon-separated values into an array
    $availableColors = $availableColors->map(function ($item) {
        return explode(':', $item);  // Split by colon
    })->flatten()->unique();

    // Apply sorting
    if ($this->orderBy == 'Price: Low to High') {
        $productsQuery->orderBy('regular_price', 'ASC');
    } elseif ($this->orderBy == 'Price: High to Low') {
        $productsQuery->orderBy('regular_price', 'DESC');
    } elseif ($this->orderBy == 'Sort by Newness') {
        $productsQuery->orderBy('created_at', 'DESC');
    }

    // Paginate the results
    $products = $productsQuery->paginate($this->pageSize);

    // Fetch categories and latest products
    $categories = Category::orderBy('name', 'ASC')->get();
    $lproducts = Product::orderBy('created_at', 'DESC')->take(8)->get();

    return view('livewire.shop-component', [
        'products' => $products,
        'categories' => $categories,
        'lproducts' => $lproducts,
        'availableColors' => $availableColors
    ]);
}

}
