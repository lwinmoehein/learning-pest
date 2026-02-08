<?php

use App\Livewire\VideoPlayer;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;

test('show details for given video', function () {
    // arrange
    $course = Course::factory()->has(Video::factory()->state([
        'title'=>'Video title',
        'description'=>'Video description',
        'slug'=>'video-slug',
        'duration'=>'10 minutes',
    ]))->create();

    // act & assert
    Livewire::test(VideoPlayer::class,[
        'video'=>$course->videos->first()
    ])->assertSeeText([
        'Video title',
        'Video description',
        '10 minutes'
    ]);
});

test('shows given video', function () {
    // arrange
    $course = Course::factory()->has(Video::factory()->state([
        'title'=>'Video title',
        'description'=>'Video description',
        'slug'=>'video-slug',
        'duration'=>'10 minutes',
        'vimeo_id'=>'vimeo-id',
    ]))->create();


    // act & assert
    Livewire::test(VideoPlayer::class,[
        'video'=>$course->videos->first()
    ])->assertSee(
       '<iframe src="https://player.vimeo.com/video/vimeo-id"',
       false
    );
});
