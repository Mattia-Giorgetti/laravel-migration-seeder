<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newTrain = new Train();
            $newTrain->agency = $faker->word();
            $newTrain->departure_station = $faker->words(3, true);
            $newTrain->arriving_station = $faker->words(3, true);
            $newTrain->departure_time = $faker->time();
            $newTrain->arriving_time = $faker->time();
            $newTrain->train_code = $faker->bothify('??-##');
            $newTrain->carriage_num = $faker->randomDigit();
            $newTrain->in_time = $faker->boolean();
            $newTrain->cancelled = $faker->boolean();

            $newTrain->save();
        }
    }
}
