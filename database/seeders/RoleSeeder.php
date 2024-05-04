<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user= Role::create(['name'=>'user']);
        $cashier= Role::create(['name'=>'cashier']);
        $manager= Role::create(['name'=>'manager']);
        $admin= Role::create(['name'=>'admin']);


        $createMedicationPerm = Permission::create(['name'=>'create medication']);
        $viewMedicationPerm = Permission::create(['name'=>'view medication']);
        $updateMedicationPerm = Permission::create(['name'=>'update medication']);
        $deleteMedicationPerm = Permission::create(['name'=>'delete medication']);
        $softDeleteMedicationPerm = Permission::create(['name'=>'soft delete medication']);

        $createPrescriptionPerm = Permission::create(['name'=>'create Prescription']);
        $updatePrescriptionPerm = Permission::create(['name'=>'update Prescription']);
        $deletePrescriptionPerm = Permission::create(['name'=>'delete Prescription']);
        $softDeletePrescriptionPerm = Permission::create(['name'=>'soft delete Prescription']);
        $viewPrescriptionPerm = Permission::create(['name'=>'view prescription']);

        $adminPerm = [
            $createMedicationPerm,
            $viewMedicationPerm,
            $updateMedicationPerm,
            $deleteMedicationPerm,
            $createPrescriptionPerm,
            $viewPrescriptionPerm,
            $updatePrescriptionPerm,
            $deletePrescriptionPerm,
        ];

        $managerPerm = [
            $updateMedicationPerm,
            $viewMedicationPerm,
            $softDeleteMedicationPerm,
            $viewPrescriptionPerm,
            $updatePrescriptionPerm,
            $softDeletePrescriptionPerm,
        ];

        $cashierPerm = [
            $updateMedicationPerm,
            $viewMedicationPerm,
            $viewPrescriptionPerm,
            $updatePrescriptionPerm,
        ];

        $admin->syncPermissions($adminPerm);
        $manager->syncPermissions($managerPerm);
        $cashier->syncPermissions($cashierPerm);

    }
}
