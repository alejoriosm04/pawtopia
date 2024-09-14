<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pet;

class PetFactory extends Factory
{
    protected $model = Pet::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'image' => 'images/pets/default_pet.png',
            'specie' => $this->faker->randomElement(['Dog', 'Cat', 'Bird', 'Fish', 'Reptile']),
            'breed' => $this->faker->word,
            'birthDate' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'characteristics' => json_encode([
                'color' => $this->faker->safeColorName,
                'size' => $this->faker->randomElement(['Small', 'Medium', 'Large']),
                'temperament' => $this->faker->randomElement(['Friendly', 'Aggressive', 'Calm'])
            ]),
            'medications' => $this->faker->sentence,
            'feeding' => $this->faker->sentence,
            'veterinaryNotes' => $this->faker->sentence,
        ];
    }
}
