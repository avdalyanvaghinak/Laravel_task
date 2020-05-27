<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $count = 1;
//        factory(User::class, $count)->create();
        DB::table('users')->insert([
            'name' => 'Admin',
            'phone' => '8563556987',
            'user_type' => 'admin',
            'email' => 'admin@mail.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('admin2020') // <---- check this
        ]);

        DB::table('users')->insert([
            'name' => 'Menejer',
            'phone' => '8563556987',
            'user_type' => 'menejer',
            'email' => 'menejer@mail.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('menejer2020') // <---- check this
        ]);

        DB::table('users')->insert([
            'name' => 'Varord',
            'phone' => '8563556987',
            'user_type' => 'varord',
            'email' => 'varord@mail.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('varord2020') // <---- check this
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'phone' => '8563556987',
            'email' => 'user@mail.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('user2020') // <---- check this
        ]);
    }
}
