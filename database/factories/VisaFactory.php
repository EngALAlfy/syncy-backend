<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Visa;

class VisaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Visa::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'number' => $this->faker->regexify('[A-Za-z0-9]{16}'),
            'expried_month' => $this->faker->word(),
            'expried_year' => $this->faker->word(),
            'cvv' => $this->faker->word(),
            'owner_name' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'category_id' => Category::factory(),
        ];
    }
}
