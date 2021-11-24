<?php

namespace Database\Seeders;

use App\Enums\AccountType;
use App\Enums\Gender;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Character;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Users
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table(TBL_USER)->truncate();
        DB::table(TBL_CHARACTER)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $adminAccount = User::create([
            'email'         => 'vivian@gmail.com',
            'username'      => 'vivian',
            'password'      => bcrypt('123456'),
            'type'          => AccountType::Admin,
            'created_at'    => date("Y-m-d H:i:s"),
        ]);

        $adminCharacter = Character::create([
            'user_id' => 1,
            'nickname' => 'Emillia',
            'bio' => 'I\'ll never be a memory',
            'avatar' => 'https://i.imgur.com/Z70RefL.jpg',
            'gender' => Gender::Female,
            'dob' => '1993-12-05',
            'address' => 'Milky Way Street',
            'level' => 1,
            'year' => 1,
            'intelligence' => 5,
            'strength' => 5,
            'vitality' => 5,
            'dexterity' => 5,
            'exp_per_second' => 10,
            'gold_per_second' => 10,
            'exp' => 5,
            'gold' => 5,
            'life_steal' => 0,
            'armor_break' => 0,
            'critical_rate' => 5,
            'critical_damage' => 200,
            'last_login' => date("Y-m-d H:i:s"),
            'last_logout' => null,
            'agent' => null,
        ]);

        User::factory()->count(5)->create()->each(function ($user) {
            Character::factory()->create([
                'user_id' => $user->id
            ]);
        });
    }
}
