<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Aaccount;
use App\Models\Category;

class AaccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aaccount::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'password' => $this->faker->password(),
            'login_url' => $this->faker->regexify('[A-Za-z0-9]{500}'),
            'image' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'category_id' => Category::factory(),
        ];
    }
}
