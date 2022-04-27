<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name=$this->faker->unique->sentence();
        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'extrac'=>$this->faker->text(250),
            'body'=>$this->faker->text(200),
            'status'=>$this->faker->randomElement([1,2]),
            'user_id'=>User::all()->random()->id,
            'category_id'=>Category::all()->random()->id,
        ];
    }
}
