<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Message::truncate();


        $faker = new Faker\Generator;
        $faker->seed(13);

        factory(App\Message::class, 25)->create()->each(function($message) {
            $message->receivers()->save(factory(App\MessageMeta::class)->make());
        });
    }
}
