<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'content', 'tags']; // Поля курса

    use HasFactory;

    protected $casts = [
        'tags' => 'array', // Декодируем JSON данные как массив
    ];
    // Отношение к главам курса
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    // Отношение к комментариям курса
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
