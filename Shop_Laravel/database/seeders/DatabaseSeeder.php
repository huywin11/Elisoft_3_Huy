<?php

namespace Database\Seeders;
use App\Models\User;

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
        // \App\Models\User::factory(10)->create();
      User::insert([
            ['name' => 'User One', 'email' => 'user1@gmail.com', 'password' => 'abc123456'],
            ['name' => 'User Two', 'email' => 'user2@gmail.com', 'password' => '123456']
        ]);
    }
}
