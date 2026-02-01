<?php

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

test('shows purchased courses', function () {
    // arrange
    $user = User::factory()->has(Course::factory()->count(2)->state(
        new Sequence(
            [
                'title' => 'Test title 1',
            ],
            [
                'title' => 'Test title 2',
            ]
        )
    ))->create();

    // act & assert
    $this->actingAs($user);

    get(route('dashboard'))->assertOk()->assertSee([
        'Test title 1',
        'Test title 2',
    ]);
});


test('shows login page for unauthenticated user', function () {
    // act && assert
    get(route('dashboard'))->assertRedirect(route('login'));
});
