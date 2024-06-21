<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Все курсы</h3>
                    
                    @foreach ($courses as $course)
                        <div class="bg-gray-100 p-4 mb-4">
                            <h4 class="font-semibold">{{ $course->title }}</h4>
                            <p class="text-sm text-gray-600">Tags: {{ is_array($course->tags) ? implode(', ', $course->tags) : implode(', ', json_decode($course->tags)) }}</p>

                            <a href="{{ route('courses.show', $course->id) }}" class="text-blue-500">Начать курс</a>
                        </div>
                    @endforeach


                    @if (empty($courses))
                        <p>Нет доступных курсов!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
