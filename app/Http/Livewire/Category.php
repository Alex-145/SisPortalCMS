<?php

namespace App\Http\Livewire;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{
    public $isOpen=false;
    public function render()
    {
        $categories=ModelsCategory::all();
        return view('livewire.category', compact('categories'));
    }
}
