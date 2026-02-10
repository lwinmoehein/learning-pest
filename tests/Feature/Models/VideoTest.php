<?php


use App\Models\Course;
use App\Models\Video;

test('test correct video duration text', function () {
    $video = Video::factory()->create();

    expect($video->getReadableDuration())->toBe($video->duration_minutes.' minutes');
});

test('video belongs to course',function(){
    $video = Video::factory()->create();

    $course = Course::factory()->create();

    $video->course()->associate($course);

    expect($video)->tobeInstanceOf(Video::class);


});
