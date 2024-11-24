<?php

use Illuminate\Database\Seeder;
use App\Classroom;
use App\Grade;
use Illuminate\Support\Facades\DB;


class ClassroomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classrooms')->delete();
        $classrooms = [
            ['en'=> 'First grade', 'ar'=> 'الصف الاول'],
            ['en'=> 'Second grade', 'ar'=> 'الصف الثاني'],
            ['en'=> 'Third grade', 'ar'=> 'الصف الثالث'],
        ];

        foreach ($classrooms as $classroom) {
            Classroom::create([
            'Name' => $classroom,
            'Grade_id' => Grade::all()->unique()->random()->id
            ]);
        }
    }
}
