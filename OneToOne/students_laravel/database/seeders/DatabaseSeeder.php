<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
       // self::seedUser();
        self::seedGrade();
    }

    public function seedUser() {

        DB::table('users')->insert([
            'name' => 'Eduardo',
            'surname' => 'Santiago Hijano',
            'email' => 'edu@profesor.es',
            'password' => bcrypt('123'),
            'user_type' => 'teacher'
        ]);
    }

    public function seedGrade() {

        DB::table('grades')->insert([
            'subject' => 'Servidor',
            'value' =>  8.1,
            'exam_date' => now(),
            'student_id' => 1,
            'teacher_id' => 3,
        ]);
    }
}
