<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ajouter etudiant, modifier etudiant, list etudiant, supprimer etudiant 

        $i = 0;
        $data = [
            ['id' => ++$i, 'guard_name' => 'web', 'name' => 'ajouter etudiant'],
            ['id' => ++$i, 'guard_name' => 'web', 'name' => 'modifier etudiant'],
            ['id' => ++$i, 'guard_name' => 'web', 'name' => 'list etudiant'],
            ['id' => ++$i, 'guard_name' => 'web', 'name' => 'supprimer etudiant'],
        ];

        Permission::upsert($data, ['id']);

        if (!Role::where('name', 'super admin')->exists()) {
            Role::create([
                'name' => 'super admin',
            ]);
        }

        if (!Role::where('name', 'gestionnaire 1')->exists()) {
            $role = Role::create([
                'name' => 'gestionnaire 1',
            ]);

            $role->syncPermissions(['ajouter etudiant', 'list etudiant']);
        }

        if (!Role::where('name', 'gestionnaire 2')->exists()) {
            $role = Role::create([
                'name' => 'gestionnaire 2',
            ]);

            $role->syncPermissions(['list etudiant', 'supprimer etudiant']);
        }
    }
}
