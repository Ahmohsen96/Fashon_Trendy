<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class HeaderComponent extends Component
{
    public function render()
    {
        $categories=Category::orderBy('name','ASC')->get();
        return view('livewire.header-component',['categories'=>$categories]);
    }
}
