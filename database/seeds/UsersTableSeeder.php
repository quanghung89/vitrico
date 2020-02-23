<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('email', '=', 'vitrico@gmail.com');
        if ($user)
        {
            $user->delete();
        }

        User::create([
            'name' => 'admin',
            'email' =>'vitrico@gmail.com',
            'image' =>'favicon.png',
            'password' => bcrypt('123123123a')
        ]);
    }
}
