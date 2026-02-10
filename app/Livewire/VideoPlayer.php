<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Video;
use Illuminate\Support\Collection;
use Livewire\Component;

class VideoPlayer extends Component
{
    public Video $video;
    public Collection $courseVideos;

    public function mount():void{
        $this->courseVideos  = $this->video->course->videos;
     }

    public function render()
    {
        return view('livewire.video-player');
    }
}
