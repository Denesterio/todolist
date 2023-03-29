<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::firstOrCreate(['name' => 'Работа']);
        Tag::firstOrCreate(['name' => 'Развлечения']);
        Tag::firstOrCreate(['name' => 'Разное']);
    }
}
