<?php

namespace Database\Factories;

use App\Models\Dvdformat;
use App\Models\Location;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dvd>
 */
class DvdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = ucwords(fake()->words(5, true));
        $fwtitle = strtok($title, " ");
        $slug = Str::slug($title, '-');
        return [
            'title' => $title,
            'imageLink' => 'https://place-hold.it/640x480/' . fake()->rgbColor() . "/ffffff.png&fontsize=16&text=$fwtitle",
            'website' => 'https://www.' . fake()->domainName() . '/' . $slug,
            'imdbLink' => 'https://www.imdb.com/' . $slug,
            'starRating'=> fake()->numberBetween(1, 5),
            'numDisks' => fake()->numberBetween(1, 10),

            'type_id' =>Type::factory(),
            'dvdformat_id' => Dvdformat::factory(),
            'location_id' => Location::factory(),

            'numEpisode' => fake()->numberBetween(1, 99),
        ];
    }
}