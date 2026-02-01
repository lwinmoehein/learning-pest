<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'tag_line'=>fake()->title,
            'slug' => fake()->slug,
            'description' => fake()->paragraph,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'learnings'=> [
                'learning A',
                'learning B',
                'learning B+'
            ],
            'image'=> 'test.png'
        ];
    }

    public function releasedAt(?\Carbon\Carbon $timestamp = null): Factory
    {
        return $this->state(function (array $attributes) use ($timestamp) {
            return [
                'released_at' => $timestamp ?? Carbon::now(),
            ];
        });
    }
}
