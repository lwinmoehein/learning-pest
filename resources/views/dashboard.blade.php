<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <ul>
                @forelse($courses as $course)
                    <li>{{$course->title}}</li>
                    <li>
                        <a href="{{route('pages.view-videos',$course)}}">View Videos</a>
                    </li>
                @empty
                    <li>No course found.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
