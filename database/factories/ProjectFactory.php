<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'baranggay' => $this->faker->city,
            'street' => $this->faker->streetName,
            'x_axis' => $this->faker->randomFloat(6, 120.0, 121.0),
            'y_axis' => $this->faker->randomFloat(6, 14.0, 15.0),
            'project_incharge_id' => $this->getProjectInchargeUserId(),
            'start_date' => $this->faker->optional()->date(),
            'end_date' => $this->faker->optional()->date(),
            'description' => $this->faker->paragraph(),
            'status' => fake()->randomElement(['suspended', 'pending','completed']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    private function getProjectInchargeUserId()
    {
        return User::where('role', 'project incharge')->first()
            ?? User::factory()->create(['role' => 'project incharge'])->id;
    }
}
