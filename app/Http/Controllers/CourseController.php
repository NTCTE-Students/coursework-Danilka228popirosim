<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Chapter;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::all();

        return view('courses.index', [
            'courses' => $courses,
        ]);

        
    }


    public function show($id)
    {
        $course = Course::with('chapters')->findOrFail($id);

        return view('courses.show', compact('course'));
    }

    public function complete(Course $course)
    {
        if (!session()->has('completed_courses')) {
            session(['completed_courses' => []]);
        }

        if (!in_array($course->id, session('completed_courses'))) {
            session()->push('completed_courses', $course->id);
        }

        return redirect()->route('profile.edit');
    }
}

