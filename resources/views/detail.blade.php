<h2>{{$course->title}}</h2>
<p>{{$course->description}}</p>
<p>{{$course->tag_line}}</p>
<ul>
    @foreach($course->learnings as $learning)
        <li>{{$learning}}</li>
    @endforeach
</ul>
<img src="{{$course->image}}" alt="course image {{$course->image}}">
