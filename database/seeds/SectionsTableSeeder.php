<?php

use Illuminate\Database\Seeder;
use App\Section;
use App\ClassRoom;
use Illuminate\Support\Facades\DB;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();

        $sections = [
            ['en' => 'a', 'ar' => 'ا'],
            ['en' => 'b', 'ar' => 'ب'],
        ];

        $classrooms = ClassRoom::all(); // Fetch all classrooms

        foreach ($classrooms as $classroom) {
            foreach ($sections as $section) {
                Section::create([
                    'Name_Section' => $section,
                    'Status' => 1,
                    'Grade_id' => $classroom->grade_id, // Use the grade associated with the classroom
                    'Class_id' => $classroom->id,       // Assign the section to the current classroom
                ]);
            }
        }
    }
}
