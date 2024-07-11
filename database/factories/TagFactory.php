<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition(): array
    {
        $technologies = [
            'PHP', 'Laravel', 'JavaScript', 'Vue.js', 'React',
            'Node.js', 'Angular', 'TypeScript', 'Python', 'Django',
            'Flask', 'Ruby on Rails', 'Java', 'Spring', 'Kotlin',
            'Swift', 'Objective-C', 'C#', '.NET', 'Go', 'Rust',
            'SQL', 'PostgreSQL', 'MySQL', 'MongoDB', 'GraphQL',
            'Docker', 'Kubernetes', 'AWS', 'Azure', 'GCP'
        ];

        return [
            'name' => $this->faker->unique()->randomElement($technologies),
        ];
    }
}
