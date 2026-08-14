<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return 
            
        [
            'task' => 'task of '.Str::random(10),
            'notes' => Str::random(10).' note',
            'done' => rand(0,1),
        ]
        ;
    }
}