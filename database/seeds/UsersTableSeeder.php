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
        (new Faker\Generator)->seed(13);

        factory(App\User::class, 10)->create();
    }
}
