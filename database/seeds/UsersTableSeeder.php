<?php

use App\User;
use App\Profile;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);

        Profile::create([
            'user_id' => $user->id,
            'username' => 'fadilnatakusumah',
            'address' => 'Jl. Kaliurang',
            'avatar' => 'assets/avatars/default.png'
        ]);
    }
}
