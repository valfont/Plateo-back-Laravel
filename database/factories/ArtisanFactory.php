<?php

namespace Database\Factories;

use App\Models\Artisan;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtisanFactory extends Factory
{
    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Artisan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nameRS' => $this->faker->name(),
            'adresse' => $this->faker->name(),
            'siren' => $this->faker->numerify('########'),
            // 'email' => Str::random(5).'@gmail.com',
            'tel' => $this->faker->numerify('########'),
            'comment' => $this->faker->text,
        ];
    }
}

        
        
        
       
       