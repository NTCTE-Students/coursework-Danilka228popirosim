{{-- show.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $course->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>{{ $course->content }}</p>
                    @foreach ($course->chapters as $chapter)
                        <div class="bg-gray-100 p-4 mb-4">
                            <h4 class="font-semibold">{{ $chapter->title }}</h4>
                            <p>{{ $chapter->content }}</p>
                        </div>
                    @endforeach
                    <form action="{{ route('courses.complete', $course) }}" method="POST">
                        @csrf
                        <button type="submit" style="color: blue">
                            Прошёл
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
