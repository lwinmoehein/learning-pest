<?php

use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
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

test('has courses', function () {
    // arrange
    $user = User::factory()->has(Course::factory()->count(2))->create();

    expect($user->courses)->toHaveCount(2)->each->toBeInstanceOf(Course::class);
});

test('shows login page for unauthenticated user', function () {
    // act && assert
    get(route('dashboard'))->assertRedirect(route('login'));
});

test('shows courses in latest order', function () {
    // arrange
    $user = User::factory()->create();

    $firstCourse = Course::factory()->create();

    $latestCourse = Course::factory()->create();

    $user->courses()->attach($firstCourse, ['created_at' => Carbon::yesterday()]);
    $user->courses()->attach($latestCourse, ['created_at' => Carbon::now()]);

    // act && assert
    $this->actingAs($user);

    get(route('dashboard'))
        ->assertOk()
        ->assertSeeTextInOrder([
            $latestCourse->title,
            $firstCourse->title,
        ]);
});

test('dont show non purchased courses', function () {
    // arrange
    $user = User::factory()->create();

    Course::factory()->count(3)->create();

    // act & assert
    $this->actingAs($user);
    get(route('dashboard'))->assertOk()->assertSeeText('No course found.');
});

test('show view videos', function () {
    // arrange
    $user = User::factory()->has(Course::factory()->count(2))->create();

    // act && assert
    $this->actingAs($user);
    get(route('dashboard'))
        ->assertOk()
        ->assertSee('View Videos');
});
