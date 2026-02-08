<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class VideoFactory extends Factory
{
    protected $model = Video::class;

    public function definition(): array
    {
        return [
            'slug' => $this->faker->slug,
            'title' => $this->faker->title,
            'description' => $this->faker->text,
            'duration'=>'10 minutes',
            'vimeo_id'=>$this->faker->uuid,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
