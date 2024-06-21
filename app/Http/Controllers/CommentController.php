<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Course;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
{
    // Валидация данных
    $request->validate([
        'content' => 'required|string',
    ]);

    // Находим курс по id
    $course = Course::findOrFail($id);

    // Создаем новый комментарий
    $comment = new Comment();
    $comment->course_id = $course->id;
    $comment->user_id = auth()->user()->id; // Предполагаем, что у вас есть аутентификация пользователей
    $comment->content = $request->input('content');
    $comment->save();

    // Перенаправляем назад на страницу курса после сохранения комментария
    return back()->with('success', 'Comment added successfully.');
}

}
