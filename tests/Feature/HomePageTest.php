<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;
use App\Models\Course;

uses(RefreshDatabase::class);

test('show courses overview', function () {
    // arrange
    $courseA = Course::factory()->create(['title'=>'Course A','description'=>'Course A description','released_at'=>now()]);
    $courseB = Course::factory()->create(['title'=>'Course B','description'=>'Course B description','released_at'=>now()]);

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
    $courseA = Course::factory()->create(['title'=>'Course A','description'=>'Course A description','released_at'=>\Illuminate\Support\Carbon::yesterday()]);
    $courseB = Course::factory()->create(['title'=>'Course B','description'=>'Course B description']);

    //act & assert
    get(route('home'))->assertSeeTextInOrder([
        $courseA->title
    ])->assertDontSeeText([$courseB->title]);
});

test('order courses by date',function(){
    // arrange
    $courseA = Course::factory()->create(['title'=>'Course A','description'=>'Course A description','released_at'=>\Illuminate\Support\Carbon::yesterday()]);
    $courseB = Course::factory()->create(['title'=>'Course B','description'=>'Course B description','released_at'=>\Illuminate\Support\Carbon::today()]);

    // act & assert
    get(route('home'))->assertSeeTextInOrder([
        $courseB->title,
        $courseA->title
    ]);
});
