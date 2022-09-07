<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gig;

class GigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Gig::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            Gig::create([
                'title' => $faker->word,
                'description' => $faker->sentence,
                'salary' => $faker->numerify('###-###'),
                'company_id' => $faker->randomDigitNotNull,
                'role_id' => $faker->randomDigitNotNull,
                'user_id' => $faker->randomDigitNotNull,
            ]);
        }
    }
}
