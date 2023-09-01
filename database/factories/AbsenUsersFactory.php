<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AbsenUsers>
 */
class AbsenUsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $index = $this->faker->numberBetween(0, 2);

        $status = ['done', 'pass', 'done'];
        $status_desc = ['Hadir', 'Alpha', 'Telat'];

        return [
            'work' => $index == 1 ? NULL : $this->faker->randomElement(['WFH', 'WFO', 'Izin']),
            'task' => $index == 1 ? NULL : $this->faker->randomElement(['Bot', 'Clone']),
            'task_desc' => $index == 1 ? NULL : $this->faker->numberBetween(10, 50),
            'status' => $status[$index],
            'status_desc' => $status_desc[$index],
            'absen_id' => fake()->unique()->numberBetween(1, 10),
            'user_id' => $this->faker->randomElement([2]),
            'created_at' => $this->faker->unique()->dateTimeBetween('-1 months', '-3 weeks', 'Asia/Makassar')->format('Y-m-d 00:00:00'),
        ];
    }
}
