<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$iEsfmLfql28i/9Gr34WYOOaZLwp.geoiLA6.4kPMAGh1uFTsDc3Aa', // password
            'role' => 'ADM',
            'is_active' => true,
        ];
    }
}
