<?php

use Illuminate\Database\Seeder;
use App\My_Parent;
use Illuminate\Support\Facades\DB;
use App\Nationalitie;

use App\Student;
use Illuminate\Support\Facades\Hash;

use App\Grade;
use App\Classroom;
use App\Section;
use App\TypeBlood;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->delete();
        $students = new Student();
        $students->name = ['ar' => 'احمد ابراهيم', 'en' => 'Ahmed Ibrahim'];
        $students->email = 'Ahmed_Ibrahim@yahoo.com';
        $students->password = Hash::make('12345678');
        $students->gender_id = 1;
        $students->nationalitie_id = Nationalitie::all()->unique()->random()->id;
        $students->blood_id = TypeBlood::all()->unique()->random()->id;
        $students->Date_Birth = date('1995-01-01');
        $students->Grade_id = Grade::all()->unique()->random()->id;
        $students->Classroom_id =Classroom::all()->unique()->random()->id;
        $students->section_id = Section::all()->unique()->random()->id;
        $students->parent_id = My_Parent::all()->unique()->random()->id;
        $students->academic_year ='2021';
        $students->save();
    }
}
