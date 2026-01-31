<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;
use App\Models\Course;

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
        $courseB->description
    ]);
});

test('show only published courses',function(){
    //arrange
    $courseA = Course::factory()->releasedAt()->create();
    $courseB = Course::factory()->create();

    //act & assert
    get(route('home'))->assertSeeText([
        $courseA->title
    ])->assertDontSeeText([$courseB->title]);
});

test('order courses by date',function(){
    // arrange
    $courseA = Course::factory()->releasedAt(\Carbon\Carbon::yesterday())->create();
    $courseB = Course::factory()->releasedAt()->create();

    // act & assert
    get(route('home'))->assertSeeTextInOrder([
        $courseB->title,
        $courseA->title
    ]);
});
