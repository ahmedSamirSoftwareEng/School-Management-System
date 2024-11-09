<?php

use Illuminate\Database\Seeder;
use App\Specialization;

use Illuminate\Support\Facades\DB;


class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['en' => 'Arabic', 'ar' => 'عربي'],
            ['en' => 'Sciences', 'ar' => 'علوم'],
            ['en' => 'Computer', 'ar' => 'حاسب الي'],
            ['en' => 'English', 'ar' => 'انجليزي'],
            ['en' => 'Mathematics', 'ar' => 'رياضيات'],
            ['en' => 'Chemistry', 'ar' => 'كيمياء'],
            ['en' => 'Physics', 'ar' => 'فيزياء'],
            ['en' => 'Biology', 'ar' => 'بيولوجيا'],
            ['en' => 'Geography', 'ar' => 'جغرافيا'],
            ['en' => 'History', 'ar' => 'تاريخ'],
            ['en' => 'Psychology', 'ar' => 'نفسي'],
            ['en' => 'Geology', 'ar' => 'جيولوجيا'],
            ['en' => 'Economics', 'ar' => 'اقتصاد'],
        ];
        foreach ($specializations as $S) {
            Specialization::create(['Name' => $S]);
        }
    }
}
