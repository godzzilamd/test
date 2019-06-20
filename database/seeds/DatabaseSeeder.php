<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            [
                'name' => 'Mishanea',
                'blocat' => '0',
                'email' => 'godzzilamd@mail.ru',
                'password' => bcrypt('admin'),
                'api_token' => Str::random(60)
            ],
            [
                'name' => 'Doge',
                'blocat' => '0',
                'email' => 'someemail@mail.ru',
                'password' => bcrypt('user'),
                'api_token' => Str::random(60)
            ]
            ]);

        DB::table('groups')->insert([
            [
                'name' => 'admins',
                'rights' => '10'
            ],
            [
                'name' => 'new',
                'rights' => '1'
            ],
            [
                'name' => 'group3',
                'rights' => '5'
            ]
        ]);
    }
}
