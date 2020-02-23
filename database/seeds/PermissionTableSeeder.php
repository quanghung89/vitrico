<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->truncate();

        $permissions = DB::table('permissions')->get();

        if ($permissions) {
            foreach ($permissions as $permission) {
                DB::table('permissions')->delete($permission->id);
            }
        }

        $arrayPermission = [
            'permission_view',
            'permission_create',
            'permission_edit',
            'permission_delete',
            'role_view',
            'role_create',
            'role_edit',
            'role_delete',
            'user_view',
            'user_create',
            'user_edit',
            'user_delete',
            'university_view',
            'university_create',
            'university_edit',
            'university_delete',
            'category_view',
            'category_create',
            'category_edit',
            'category_delete',
            'new_view',
            'new_create',
            'new_edit',
            'new_delete',
            'student_view',
            'student_create',
            'student_edit',
            'student_delete',
            'banner_view',
            'banner_create',
            'banner_edit',
            'banner_delete',
        ];

        foreach ($arrayPermission as $permission) {
            $data = [
                'title' => $permission
            ];

            \App\Models\Permission::create($data);
        }

    }
}
