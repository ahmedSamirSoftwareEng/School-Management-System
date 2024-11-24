<?php

use Illuminate\Database\Seeder;
use App\Section;
use App\ClassRoom;
use App\Grade;
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

        $Sections = [
            ['en' => 'a', 'ar' => 'ا'],
            ['en' => 'b', 'ar' => 'ب'],
            ['en' => 'c', 'ar' => 'ت'],
        ];

        foreach ($Sections as $section) {
            Section::create([
                'Name_Section' => $section,
                'Status' => 1,
                'Grade_id' => Grade::all()->unique()->random()->id,
                'Class_id' => ClassRoom::all()->unique()->random()->id
            ]);
        }
    }
}
