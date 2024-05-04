<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $user = User::factory()->create([
            'name'=> 'Kamal',
            'email'=>'kamal@test.com',
            'password'=>'password123',
            'username'=>'kamal',
        ]);
        $user->assignRole('user');


//        $this->call([
//            RoleSeeder::class,
//            UserSeeder::class,
//            MedicationSeeder::class,
//            CustomerSeeder::class,
//        ]);
    }
}
