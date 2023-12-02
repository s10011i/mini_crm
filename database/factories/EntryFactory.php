<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class EntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'requester'=>$this->faker->name,
            'req_number'=>$this->faker->numberBetween(10,1000),
            'date'=>$this->faker->date,
            'complains'=>$this->faker->paragraph(1),
            'assignee_id'=>$this->faker->numberBetween(1,20),
            'status'=>'pending'
        ];
    }
}
