<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        Schema::enableForeignKeyConstraints();

        $roles = [
            ['name' => 'Administrator', 'slug' => 'admin'],
            ['name' => 'User', 'slug' => 'user'],
            ['name' => 'Marketing', 'slug' => 'marketing'],
            ['name' => 'Keuangan', 'slug' => 'keuangan'],
            ['name' => 'Admin Konsumen', 'slug' => 'admin-konsumen'],
            ['name' => 'Legal', 'slug' => 'legal'],
            ['name' => 'All', 'slug' => '*'],
            ['name' => 'Manager Marketing', 'slug' => 'manager-marketing'],
            ['name' => 'Manager Keuangan', 'slug' => 'manager-keuangan'],
            ['name' => 'Manager Legal', 'slug' => 'manager-legal'],
            ['name' => 'Manager Admin Konsumen', 'slug' => 'manager-admin-konsumen'],
            ['name' => 'Super Admin', 'slug' => 'super-admin'],
        ];

        collect($roles)->each(function ($role) {
            Role::create($role);
        });
    }
}
