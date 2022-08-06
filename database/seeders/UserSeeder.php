<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()



    {
        $password = Hash::make('123456789');
        $user = User::create([
            'name' => 'Shourav',
            'email' => 'shourav@gmail.com',
            'email_verified_at' => now(),
            'password' => $password,

        ]);

         $user->assignRole('writer', 'supervisor');
    }
}
