<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'role_id' => Role::firstOrCreate(['naam' => 'technicus'])->id,
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'telefoonnummer' => fake()->phoneNumber(),
            'password' => static::$password ??= Hash::make('Welkom123!'),
            'actief' => true,
            'remember_token' => Str::random(10),
        ];
    }

    public function rol(string $naam): static
    {
        return $this->state(fn () => [
            'role_id' => Role::firstOrCreate(['naam' => $naam])->id,
        ]);
    }
}