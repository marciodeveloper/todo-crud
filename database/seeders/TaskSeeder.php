<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i < 20; $i++) {
            DB::table('tasks')->insert([
                'title' => 'Taarefa ' . ($i + 1),
                'description' => 'Descrição da Tarefa ' . ($i + 1),
                'status' => 'pendente'
            ]);
        }
    }
}
