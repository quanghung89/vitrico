<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->where('title', 'Admin')->delete();

        DB::table('roles')->insert([
            'title' => 'Admin',
        ]);

        $role = DB::table('roles')->where('title', '=', 'Admin')->get();

        $users = DB::table('users')->where('email', '=', 'vitrico@gmail.com')->get();

        $roleUser = [
            'user_id' => $users[0]->id,
            'role_id' => $role[0]->id
        ];
        DB::table('role_user')->insert($roleUser);

    }
}
