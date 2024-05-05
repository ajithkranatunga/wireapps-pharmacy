<?php

namespace Database\Seeders;

use App\Models\Medication;
use App\Models\Prescription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prescription::factory(10)->create();

        $medicCount = Medication::count();

        Prescription::all()->each(function ($pres) use ($medicCount) {
            $pres->medications()->attach(
                Medication::all()->random(rand(1, $medicCount))->pluck('id')->toArray()
            );
        });
    }
}
