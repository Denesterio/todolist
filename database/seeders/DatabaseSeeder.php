<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\TodoSeeder;
use Database\Seeders\TodoItemSeeder;
use Database\Seeders\TagSeeder;
use Database\Seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            TodoSeeder::class,
            TodoItemSeeder::class,
            TagSeeder::class,
        ]);
    }
}
