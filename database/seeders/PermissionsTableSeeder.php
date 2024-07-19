<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        // Hapus semua data di tabel permissions
        DB::table('permissions')->truncate();

        // Tambahkan permission 'allow-all'
        $permissionId = DB::table('permissions')->insertGetId([
            'name' => 'allow-all',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Temukan role Super Admin
        $superAdminRole = DB::table('roles')->where('name', 'Super Admin')->first();

        if ($superAdminRole) {
            // Tambahkan hubungan antara role Super Admin dan permission 'allow-all'
            DB::table('role_permissions')->insert([
                'role_id' => $superAdminRole->id,
                'permission_id' => $permissionId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
