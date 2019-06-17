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
                'group_id' => '1',
                'blocat' => '0',
                'email' => 'godzzilamd@mail.ru',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Doge',
                'group_id' => '2',
                'blocat' => '0',
                'email' => 'someemail@mail.ru',
                'password' => bcrypt('user'),
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
            ]
        ]);
    }
}
