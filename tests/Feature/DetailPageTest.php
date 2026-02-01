<?php

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

test('shows all course detail fields', function () {
    // arrange
    $course = Course::factory()->create();

    // act & assert
    get(route('course-details', $course))->assertOk()->assertSeeText([
        $course->tag_line,
        $course->learnings[0],
        $course->learnings[1],
        $course->learnings[2]
    ])->assertSee($course->image);
});


test('shows videos',function(){
    // arrange
    $course = Course::factory()->create();

    $videos = \App\Models\Video::factory()->count(3)->create(['course_id' => $course->id]);

    get(route('course-details', $course))
        ->assertOk()
        ->assertSee('3 videos');
});
