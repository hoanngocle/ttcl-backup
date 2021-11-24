<?php

namespace Database\Factories;

use App\Enums\Gender;
use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Character::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nickname' => $this->faker->unique()->userName(),
            'bio' => $this->faker->text,
            'avatar' => 'https://i.imgur.com/Z70RefL.jpg',
            'gender' => Gender::Female,
            'dob' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'address' => $this->faker->address,
            'level' => config('settings.level'),
            'year' => config('settings.year'),
            'intelligence' => config('settings.intelligence'),
            'strength' => config('settings.strength'),
            'vitality' => config('settings.vitality'),
            'dexterity' => config('settings.dexterity'),
            'exp_per_second' => config('settings.exp_per_second'),
            'gold_per_second' => config('settings.gold_per_second'),
            'exp' => config('settings.exp'),
            'gold' => config('settings.gold'),
            'life_steal' => config('settings.life_steal'),
            'armor_break' => config('settings.armor_break'),
            'critical_rate' => config('settings.critical_rate'),
            'critical_damage' => config('settings.critical_damage'),
            'last_login' => date("Y-m-d H:i:s"),
            'last_logout' => null,
            'agent' => null,
        ];
    }
}
