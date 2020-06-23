<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataArray = [];
        for ($i = 0; $i < 10; $i++) {
            array_push($dataArray, [
                'title' => \Illuminate\Support\Str::random(10),
                'content' => \Illuminate\Support\Str::random(10),
                'image' => \Illuminate\Support\Str::random(10),
                'due_date' => date('Y-m-d', mt_rand(1, time())),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        DB::table('tasks')->insert($dataArray);
    }
}
