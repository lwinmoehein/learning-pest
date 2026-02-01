<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

test('gives back successful response for courses page', function () {
    // act & assert
    get(route('pages.home'))->assertOk();
});

test('gives back successful response for course detail page', function () {
    // arrange
    $course = Course::factory()->releasedAt()->create();

    // act and assert
    get(route('pages.course-details', $course))->assertOk();
});
