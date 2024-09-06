<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class product extends Model
{
    use HasFactory , HasTranslations;
    public $translatable = ['name', 'short_description', 'description'];
    protected $fillable = [
        'slug', 'regular_price', 'sale_price', 'SKU', 'stock_status', 'featured', 'quantity', 'image', 'images', 'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }


public function attributeValues()
{
    return $this->hasMany(AttributeValue::class,'product_id');
}

public function getStockStatusText()
{
    if ($this->quantity > 0) {
        return $this->quantity . ' Items In Stock';
    } else {
        return 'Out of Stock';
    }
}

public function updateStockStatus()
{
    $this->stock_status = $this->quantity > 0 ? 'instock' : 'outofstock';
    $this->save();
}

public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_product');
    }

}
