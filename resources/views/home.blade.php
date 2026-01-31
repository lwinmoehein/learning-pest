@foreach($courses as $course)
    <div>{{$course->title}}</div>
    <div>{{$course->description}}</div>
@endforeach
