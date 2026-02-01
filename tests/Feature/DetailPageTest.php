<?php

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

test('shows all course detail fields', function () {
    // arrange
    $course = Course::factory()->create([
        'tag_line' => 'Tagline',
        'image' => 'image.jpg',
        'learnings' => [
            'learning 1',
            'learning 2',
            'learning 3',
        ],
    ]);

    // act & assert
    get(route('details', $course))->assertSeeText([
        $course->tag_line,
        'learning 1',
        'learning 2',
        'learning 3',
    ])->assertSee($course->image);
});
