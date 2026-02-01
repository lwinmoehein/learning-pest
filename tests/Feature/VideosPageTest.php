<?php

namespace Tests\Feature;

use App\Livewire\VideoPlayer;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Sequence;

use function Pest\Laravel\get;

it('redirects guest user', function () {
    // arrange
    $course = Course::factory()->create();

    // act & assert
    get(route('pages.view-videos', $course))
        ->assertRedirect(route('login'));
});

it('shows video player', function () {
    // arrange
    $course = Course::factory()->has(Video::factory())->create();

    loginAsUser();

    // act && assert
    get(route('pages.view-videos', $course))
        ->assertOk()
        ->assertSeeLivewire(VideoPlayer::class);
});

it('shows first video', function () {
    // arrange
    $course = Course::factory()->has(Video::factory()->count(2)->state(new Sequence(
        [
            'title' => 'First video',
        ],
        [
            'title' => 'Second video',
        ]
    )))->create();

    loginAsUser();

    // act && assert
    get(route('pages.view-videos', $course))
        ->assertOk()
        ->assertSeeText('First video');
});

it('shows route parameter video', function () {
    // arrange
    $course = Course::factory()->has(Video::factory()->count(2)->state(new Sequence(
        [
            'title' => 'First video',
        ],
        [
            'title' => 'Second video',
        ]
    )))->create();

    loginAsUser();

    // act && assert
    get(route('pages.view-videos', ['course' => $course, 'video' => $course->videos->last()]))
        ->assertOk()
        ->assertSeeText('Second video');
});
