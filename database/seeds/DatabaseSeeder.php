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
                'name' => 'admins'
            ],
            [
                'name' => 'new'
            ],
            [
                'name' => 'group3'
            ]
        ]);

        DB::table('permissions')->insert([
            [
                'name' => 'user_make',
                'description' => 'make user'
            ],
            [
                'name' => 'user_edit',
                'description' => 'edit user'
            ],
            [
                'name' => 'user_delete',
                'description' => 'delete user'
            ],
            [
                'name' => 'group_make',
                'description' => 'make group'
            ],
            [
                'name' => 'group_edit',
                'description' => 'edit group'
            ],
            [
                'name' => 'group_delete',
                'description' => 'delete group'
            ]
        ]);
    }
}
