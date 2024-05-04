<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name'=> 'John Doe',
            'email'=>'john.doe@test.com',
            'password'=>'password123',
            'username'=>'john.doe',
        ]);

        $manager = User::factory()->create([
            'name'=> 'Adam Taylor',
            'email'=>'adam.t@test.com',
            'password'=>'password123',
            'username'=>'adam.t',
        ]);

        $cashier = User::factory()->create([
            'name'=> 'Mark Antony',
            'email'=>'mark.a@test.com',
            'password'=>'password123',
            'username'=>'mark.a',
        ]);

        $admin->assignRole('admin');
        $manager->assignRole('manager');
        $cashier->assignRole('cashier');

    }
}
