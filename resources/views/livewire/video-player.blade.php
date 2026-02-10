<div>
    <div>
        {{$video->title}}
        {{$video->description}}
        {{$video->getReadableDuration()}}
        <iframe src="https://player.vimeo.com/video/{{$video->vimeo_id}}"
                width="640"
                height="360"
                frameborder="0"
                allow="autoplay; fullscreen; picture-in-picture"
                allowfullscreen>
        </iframe>
    </div>
    <ul>
        @foreach($courseVideos as $video)
            <li>
                <a href="{{route('pages.view-videos',['video'=>$video,'course'=>$video->course])}}">{{$video->title}}</a>
            </li>
        @endforeach
    </ul>

</div>
