<h2>{{$course->title}}</h2>
<p>{{$course->description}}</p>
<p>{{$course->tag_line}}</p>
<p>{{$course->videos_count}} videos</p>
<ul>
    @foreach($course->learnings as $learning)
        <li>{{$learning}}</li>
    @endforeach
</ul>
<img src="{{asset('images/'.$course->image_name)}}" alt="course image {{$course->title}}">
