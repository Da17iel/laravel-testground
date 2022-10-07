<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Comments;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id' => rand(1, 5),
            'title' => $this->faker->text(20),
            'slug' => $this->faker->slug(),
            'image' => $this->faker->randomElement(
                array(
                    'sample-picture-1.png',
                    'sample-picture-2.jpg',
                    'sample-picture-3.jpg',
                    'sample-picture-4.png',
                    'sample-picture-5.jpg',
                    'sample-picture-6.png',
                    'sample-picture-7.jpg'
                )
            ),
            'body' => $this->faker->text(5000),
        ];
    }
}
