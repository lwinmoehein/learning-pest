<?php


use App\Models\Video;

test('test correct video duration text', function () {
    $video = Video::factory()->create();

    expect($video->getReadableDuration())->toBe($video->duration_minutes.' minutes');
});
