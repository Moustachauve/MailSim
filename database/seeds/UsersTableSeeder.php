<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::truncate();

        (new Faker\Generator)->seed(42);

        factory(App\User::class, 10)->create();
    }
}
