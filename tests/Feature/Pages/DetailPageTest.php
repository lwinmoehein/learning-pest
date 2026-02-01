<?php

use App\Models\Course;

use function Pest\Laravel\get;

test('shows all course detail fields', function () {
    // arrange
    $course = Course::factory()->releasedAt()->create();

    // act & assert
    get(route('pages.course-details', $course))->assertOk()->assertSeeText([
        $course->title,
        $course->description,
        $course->tag_line,
        ...$course->learnings,
    ])->assertSee(asset('images/'.$course->image_name));
});

test('shows videos', function () {
    // arrange
    $course = Course::factory()
        ->releasedAt()
        ->has(\App\Models\Video::factory()
            ->count(3))->create();

    get(route('pages.course-details', $course))
        ->assertOk()
        ->assertSee('3 videos');
});

test('show only released course', function () {
    $course = Course::factory()->create();

    get(route('pages.course-details', $course))->assertNotFound();
});
