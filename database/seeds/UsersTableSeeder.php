<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->truncate();
        User::create([
            'name' => 'admin',
            'email' =>'vitrico@gmail.com',
            'image' =>'favicon.png',
            'level' =>User::LEVEL_ADMIN,
            'status' =>User::STATUS_ENABLE,
            'password' => bcrypt('123123123a')
        ]);
    }
}
