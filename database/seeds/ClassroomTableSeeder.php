<?php

use Illuminate\Database\Seeder;
use App\Classroom;
use App\Grade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

        $defaultClassrooms = [
            ['en' => 'First grade', 'ar' => 'الصف الاول'],
            ['en' => 'Second grade', 'ar' => 'الصف الثاني'],
            ['en' => 'Third grade', 'ar' => 'الصف الثالث'],
        ];

        $additionalClassrooms = [
            ['en' => 'Fourth grade', 'ar' => 'الصف الرابع'],
            ['en' => 'Fifth grade', 'ar' => 'الصف الخامس'],
            ['en' => 'Sixth grade', 'ar' => 'الصف السادس'],
        ];

        $grades = Grade::all();

        foreach ($grades as $grade) {

            foreach ($defaultClassrooms as $classroom) {
                Classroom::create([
                    'Name' => $classroom,
                    'Grade_id' => $grade->id,
                ]);
            }

            // Add additional classrooms only for "Primary stage"
            if ($grade->id == 1) {
                foreach ($additionalClassrooms as $classroom) {
                    Classroom::create([
                        'Name' => $classroom,
                        'Grade_id' => $grade->id,
                    ]);
                }
            }
        }
    }
}
