<?php

namespace App\Models;

use App\Models\Category;
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


}
