<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Todo::firstOrCreate([
            'title' => 'На каждый день',
            'description' => 'Дела на каждый день',
            'user_id' => 1,
            'type' => Todo::PRIVATE_TYPE
        ]);
        Todo::firstOrCreate([
            'title' => 'Планы',
            'description' => 'Долгосрочные дела',
            'user_id' => 1,
            'type' => Todo::PUBLIC_TYPE,
        ]);
    }
}
