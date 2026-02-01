<?php

use App\Models\Course;
use App\Models\Video;

use function Pest\Laravel\get;

test('show courses overview', function () {
    // arrange
    $courseA = Course::factory()->releasedAt()->create();
    $courseB = Course::factory()->releasedAt()->create();

    // act & assert
    get(route('pages.home'))->assertSeeText([
        $courseA->title,
        $courseA->description,
        $courseB->title,
        $courseB->description,
    ]);
});

test('show only published courses', function () {
    // arrange
    $courseA = Course::factory()->releasedAt()->create();
    $courseB = Course::factory()->create();

    // act & assert
    get(route('pages.home'))->assertSeeText([
        $courseA->title,
    ])->assertDontSeeText([$courseB->title]);
});

test('order courses by date', function () {
    // arrange
    $courseA = Course::factory()->releasedAt(\Carbon\Carbon::yesterday())->create();
    $courseB = Course::factory()->releasedAt()->create();

    // act & assert
    get(route('pages.home'))->assertSeeTextInOrder([
        $courseB->title,
        $courseA->title,
    ]);
});

test('course has videos', function () {
    $courseA = Course::factory()->has(Video::factory()->count(3))->releasedAt()->create();

    expect($courseA->videos)->toHaveCount(3)->each()->toBeInstanceOf(Video::class);
});
