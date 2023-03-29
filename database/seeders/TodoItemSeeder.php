<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data1 = [
            ['description' => 'Встать с кровати', 'todo_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'Проснуться', 'todo_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'Позавтракать', 'todo_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'Повздыхать, сидя на диване', 'todo_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'Работать работу', 'todo_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'Поужинать', 'todo_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'Сасоразвиваться или самодеградировать', 'todo_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'Повздыхать, лежа в кровати', 'todo_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'Спать', 'todo_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];
        $data2 = [
            ['description' => 'Выучить программирование', 'todo_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'Программировать', 'todo_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('todo_items')->upsert($data1, ['description', 'todo_id'], ['created_at', 'updated_at']);
        DB::table('todo_items')->upsert($data2, ['description', 'todo_id'], ['created_at', 'updated_at']);
    }
}
