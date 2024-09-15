<?php

namespace Database\Factories;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    protected $model = Pet::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'image' => 'images/pets/default_pet.png',
            'species' => $this->faker->randomElement(['Dog', 'Cat', 'Fish', 'Bird', 'Small Pet']),
            'breed' => $this->faker->word,
            'birthDate' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'characteristics' => json_encode([
                'color' => $this->faker->safeColorName,
                'size' => $this->faker->randomElement(['Small', 'Medium', 'Large']),
                'temperament' => $this->faker->randomElement(['Friendly', 'Aggressive', 'Calm']),
            ]),
            'medications' => $this->faker->sentence,
            'feeding' => $this->faker->sentence,
            'veterinaryNotes' => $this->faker->sentence,
        ];
    }
}
