<?php

namespace App\Http\Livewire;

use App\Models\Category as ModelsCategory;
use Livewire\Component;
use PhpParser\Node\Expr\FuncCall;

class Category extends Component
{
    public $isOpen=false;
    public $category_id,$name, $slug;
    public function render()
    {
        $categories=ModelsCategory::all();
        return view('livewire.category', compact('categories'));
    }

    public function create(){
        $this->openModal();
    }

    public function openModal(){
        $this->isOpen=true;


    }

    public function closeModal(){
        $this->isOpen=false;

    }
    private function resetInputFields(){
        $this->name="";
        $this->slug="";
    }

    public function store(){
        $this->validate([
            'name'=> 'required|min:4',
            'slug'=> 'required',
        ]);
        ModelsCategory::updateOrCreate(['id'=>$this->category_id],
            [
                'name'=>$this->name,
                'slug'=>$this->slug,
            ]

        );
        session()->flash('message','Registro Creado');
        $this->closeModal();
        $this->resetInputFields();
    }
}
