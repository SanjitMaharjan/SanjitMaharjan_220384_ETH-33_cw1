<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $numberOfCustomers = 3;
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'phone_number' => "9801234567",
                "password" => "im@dmin",
                "is_admin" => true,
            ],
        ];
        for ($i = 0; $i < $numberOfCustomers; $i++) {
            array_push($users, [
                'name' => $faker->name,
                'email' =>  $faker->unique()->safeEmail,
                'phone_number' => $faker->numberBetween(9800000000, 9899999999),
                "password" => Str::random(10),
                "is_admin" => false,
            ]);
        }
        foreach ($users as $user) {
            User::create([
                "name" => $user['name'],
                "email" => $user['email'],
                "phone_number" => $user['phone_number'],
                "password" => bcrypt($user['password']),
                "is_admin" => $user['is_admin']
            ]);
        }
    }
}
