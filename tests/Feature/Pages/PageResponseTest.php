<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\User;

use function Pest\Laravel\get;

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

test('shows purchased courses', function () {
    // arrange
    $user = User::factory()->has(Course::factory()->count(3))->create();

    // act & assert
    $this->actingAs($user);

    get(route('pages.dashboard'))->assertOk();
});
