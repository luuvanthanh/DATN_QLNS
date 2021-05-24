<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Position;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class WorkerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Worker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->postcode(),
            'name' => $this->faker->name(),
            // 'sex' => $this->faker->randomElement(['0', '1']),
            'birthday' => $this->faker->date(),
            'cmnd_no' => $this->faker->unique()->randomNumber(9),
            'day_range' => $this->faker->date(),
            'issued_by' => $this->faker->date(),
            'address' => $this->faker->country(),
            'phone' => '0'. $this->faker->unique()->randomNumber(9),
            'day_work' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail(),
            'level' => Str::random(10),
            'certificate' => 'Bằng kỹ sư',
            'school' => 'Truong SPKT',
            'skill' => 'IT',
            // 'status' => '',
            'department_id' => Department::all()->random()->id,
            'position_id' => Position::all()->random()->id,
            'salary_id' => $this->faker->randomNumber(2),
        ];
    }
}
