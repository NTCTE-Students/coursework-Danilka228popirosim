<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $courses = Course::all();

        foreach ($courses as $course) {
            $tags = json_decode($course->tags);
            if (!is_array($tags)) {
                $course->tags = json_encode([$tags]);
                $course->save();
            }
        }
    }
}

