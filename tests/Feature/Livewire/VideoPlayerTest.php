<?php

use App\Livewire\VideoPlayer;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('show details for given video', function () {
    // arrange
    $course = Course::factory()->has(Video::factory())->create();
    $video = $course->videos()->first();

    // act & assert
    Livewire::test(VideoPlayer::class,[
        'video'=>$video
    ])->assertSeeText([
        $video->title,
        $video->description,
        $video->getReadableDuration()
    ]);
});

test('shows given video', function () {
    // arrange
    $course = Course::factory()->has(Video::factory())->create();
    $video = $course->videos()->first();

    // act & assert
    Livewire::test(VideoPlayer::class,[
        'video'=> $video
    ])->assertSeeHtml(
       '<iframe src="https://player.vimeo.com/video/'.$video->vimeo_id
    );
});
