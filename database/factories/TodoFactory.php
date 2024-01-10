<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Todo;

class TodoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Todo::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'task' => $this->faker->regexify('[A-Za-z0-9]{500}'),
            'project_name' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'status' => $this->faker->randomElement(["pending","successful","failed"]),
            'category_id' => Category::factory(),
        ];
    }
}
