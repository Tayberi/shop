<?php

namespace Database\Seeders;

use App\Models\Product;
use Database\Factories\BrandFactory;
use Database\Factories\CategoryFactory;
use Database\Factories\PropertyFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        BrandFactory::new()->count(20)->create();

        $properties = PropertyFactory::new()->count(10)->create();

        CategoryFactory::new()->count(10)
            ->has(
                Product::factory(10)
                ->hasAttached($properties, function () {
                    return ['value' => ucfirst(fake()->word())];
                })

            )
            ->create();
    }
}
