<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lastname' => $this->faker->name(),
            'firstname' => $this->faker->name(),
            'nameRS' => $this->faker->name(),
            'siren' => $this->faker->numerify('########'),
            'tel' => $this->faker->numerify('########'),
            // 'email' => Str::random(5).'@gmail.com',
            'adresse' => $this->faker->name(),
            'comment' => $this->faker->text,
        ];
    }
}
