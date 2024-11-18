<?php

namespace Tests\Unit;

use App\Models\Pet;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PetTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_get_age_correctly_calculates_age()
    {
        $birthDate = (new DateTime)->modify('-3 years')->format('Y-m-d');

        $pet = new Pet([
            'birthDate' => $birthDate,
        ]);

        $this->assertEquals(3, $pet->getAge());
    }

    /**
     * @return void
     */
    public function test_get_image_returns_full_url_if_valid()
    {
        $imageUrl = 'https://example.com/images/pet.jpg';

        $pet = new Pet([
            'image' => $imageUrl,
        ]);

        $this->assertEquals($imageUrl, $pet->getImage());
    }

    /**
     * @return void
     */
    public function test_get_image_prepends_storage_if_not_url()
    {
        $imagePath = 'images/pet.jpg';
        $expectedUrl = url('storage/images/pet.jpg');

        $pet = new Pet([
            'image' => $imagePath,
        ]);

        $this->assertEquals($expectedUrl, $pet->getImage());
    }

    /**
     * @return void
     */
    public function test_set_and_get_name()
    {
        $name = 'Fido';

        $pet = new Pet;
        $pet->setName($name);

        $this->assertEquals($name, $pet->getName());
    }

    /**
     * @return void
     */
    public function test_get_image_handles_leading_slash()
    {
        $imagePath = '/images/pet.jpg';
        $expectedUrl = url('storage/images/pet.jpg');

        $pet = new Pet([
            'image' => $imagePath,
        ]);

        $this->assertEquals($expectedUrl, $pet->getImage());
    }

    /**
     * @return void
     */
    public function test_get_age_handles_future_birthdate()
    {
        // Fecha de nacimiento dentro de 2 años
        $birthDate = (new DateTime)->modify('+2 years')->format('Y-m-d');

        $pet = new Pet([
            'birthDate' => $birthDate,
        ]);

        $this->assertEquals(0, $pet->getAge());
    }
}
