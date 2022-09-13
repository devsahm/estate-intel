<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{


    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "isbn" => $this->faker->phoneNumber,
            "authors" => [$this->faker->name],
            "number_of_pages" => $this->faker->numberBetween(10, 100),
            "publisher" => $this->faker->name,
            "country" => $this->faker->country,
            "release_date" => $this->faker->date
        ];
    }
}
