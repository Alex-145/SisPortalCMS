<?php

namespace App\Http\Livewire;

use App\Models\Category as ModelsCategory;
use Livewire\Component;
use PhpParser\Builder\Function_;
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
        session()->flash('message',
            $this ->category_id ?'registro actualizado satisfatoriaente':'registro creado satisfatoriamente');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit(ModelsCategory $category){
        $this->category_id=$category->id;
        $this->name=$category->name;
        $this->slug=$category->slug;
        $this->openModal();

    }

    public function delete(ModelsCategory $category){
        $category->delete();
        session()->flash('message','registro borrado satisfactoriamente');
    }
}
