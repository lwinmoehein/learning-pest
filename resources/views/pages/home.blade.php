<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <ul>
                @forelse($courses as $course)
                    <div>
                        <div>{{$course->title}}</div>
                        <div>{{$course->description}}</div>
                    </div>
                @empty
                    <li>No course found.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
