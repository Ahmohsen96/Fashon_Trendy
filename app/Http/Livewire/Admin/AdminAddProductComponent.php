<?php

namespace App\Http\Livewire\Admin;

use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;


class AdminAddProductComponent extends Component
{

    use WithFileUploads;




    public $name ;
    public $slug ;
    public $short_description ;
    public $description;
    public $regular_price ;
    public $sale_price ;
    public $sku ;
    public $stock_status ='instock';
    public $featured =0 ;
    public $quantity;
    public $image;
    public $category_id;
    public $images;


public $attr;
public $inputs = [];
public $attribute_arr = [];
public $attribute_values;

    public function generateSlug()
    {
        $this->slug=Str::slug($this->name);
    }



//     public function addProduct()
// {
//     $this->validate([
//         'name.en' => 'required',
//         'name.ar' => 'required',
//         'slug' => 'required',
//         'short_description.en' => 'required',
//         'short_description.ar' => 'required',
//         'description.en' => 'required',
//         'description.ar' => 'required',
//         'regular_price' => 'required',
//         'sale_price' => 'required',
//         'sku' => 'required',
//         'stock_status' => 'required',
//         'featured' => 'required',
//         'image' => 'required',
//         'category_id' => 'required',
//     ]);

//     $product = new Product();

//     $product->slug = $this->slug;
//     $product->regular_price = $this->regular_price;
//     $product->sale_price = $this->sale_price;
//     $product->SKU = $this->sku;
//     $product->stock_status = $this->stock_status;
//     $product->featured = $this->featured;
//     $product->quantity = $this->quantity;

//     $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
//     $this->image->storeAs('products', $imageName);
//     $product->image = $imageName;

//     if ($this->images) {
//         $imagesName = '';
//         foreach ($this->images as $key => $image) {
//             $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
//             $image->storeAs('products', $imgName);
//             $imagesName = $imagesName . ',' . $imgName;
//         }
//         $product->images = $imagesName;
//     }

//     $product->category_id = $this->category_id;

//     // Save translations
//     $product->setTranslations('name', $this->name);
//     $product->setTranslations('short_description', $this->short_description);
//     $product->setTranslations('description', $this->description);

//     $product->save();

//     // Save attributes
//     foreach ($this->attribute_values as $key => $attribute_value) {
//         $avalues = explode(":", $attribute_value);
//         foreach ($avalues as $avalue) {
//             $attr_value = new AttributeValue();
//             $attr_value->product_attribute_id = $key;
//             $attr_value->value = $avalue;
//             $attr_value->product_id = $product->id;
//             $attr_value->save();
//         }
//     }

//     session()->flash('message', 'Product has been added');
// }

public function addProduct()
{
    $this->validate([
        'name.en' => 'required',
        'name.ar' => 'required',
        'slug' => 'required',
        'short_description.en' => 'required',
        'short_description.ar' => 'required',
        'description.en' => 'required',
        'description.ar' => 'required',
        'regular_price' => 'required',
        'sale_price' => 'required',
        'sku' => 'required',
        'stock_status' => 'required',
        'featured' => 'required',
        'image' => 'required',
        'category_id' => 'required',
    ]);

    $product = new Product();

    // Other product fields...
    $product->slug = $this->slug;
    $product->regular_price = $this->regular_price;
    $product->sale_price = $this->sale_price;
    $product->SKU = $this->sku;
    $product->stock_status = $this->stock_status;
    $product->featured = $this->featured;
    $product->quantity = $this->quantity;
    $product->category_id = $this->category_id;

    // Save image
    $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
    $this->image->storeAs('products', $imageName);
    $product->image = $imageName;

    if ($this->images) {
        $imagesName = '';
        foreach ($this->images as $key => $image) {
            $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
            $image->storeAs('products', $imgName);
            $imagesName = $imagesName . ',' . $imgName;
        }
        $product->images = $imagesName;
    }

    // Save translations
    $product->setTranslations('name', $this->name);
    $product->setTranslations('short_description', $this->short_description);
    $product->setTranslations('description', $this->description);

    // Save product to database
    $product->save();

    // Save attributes as arrays
    foreach ($this->attribute_values as $key => $attribute_value) {
        $attr_value = new AttributeValue();
        $attr_value->product_attribute_id = $key;

        // Store the value as a JSON-encoded array
        $attr_value->value = json_encode(explode(":", $attribute_value));

        $attr_value->product_id = $product->id;
        $attr_value->save();
    }

    session()->flash('message', 'Product has been added');
}


    public function add()
{
    if(!in_array($this->attr,$this->attribute_arr))
    {
        array_push($this->inputs,$this->attr);
        array_push($this->attribute_arr,$this->attr);
    }
}

public function remove($attr)
{
    unset($this->inputs[$attr]);
}


    public function render()
    {
        $pattributes = ProductAttribute::all();

        $categories = Category::orderBY('name','ASC')->get();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories,'pattributes'=>$pattributes]);
    }
}
