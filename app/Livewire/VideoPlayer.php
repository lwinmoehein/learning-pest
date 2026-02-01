<?php

namespace App\Livewire;

use App\Models\Video;
use Livewire\Component;

class VideoPlayer extends Component
{
    public Video $video;

    public function render()
    {
        return view('livewire.video-player');
    }
}
