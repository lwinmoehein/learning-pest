<?php

use App\Models\Course;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

test('show courses overview', function () {
    // arrange
    $courseA = Course::factory()->releasedAt()->create();
    $courseB = Course::factory()->releasedAt()->create();

    // act & assert
    get(route('home'))->assertSeeText([
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
    get(route('home'))->assertSeeText([
        $courseA->title,
    ])->assertDontSeeText([$courseB->title]);
});

test('order courses by date', function () {
    // arrange
    $courseA = Course::factory()->releasedAt(\Carbon\Carbon::yesterday())->create();
    $courseB = Course::factory()->releasedAt()->create();

    // act & assert
    get(route('home'))->assertSeeTextInOrder([
        $courseB->title,
        $courseA->title,
    ]);
});

test('course has videos',function(){
   $courseA = Course::factory()->releasedAt()->create();
   Video::factory()->count(3)->create(['course_id' => $courseA->id]);

   expect($courseA->videos)->toHaveCount(3)->each()->toBeInstanceOf(Video::class);
});
