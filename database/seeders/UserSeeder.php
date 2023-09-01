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
        $users = [
            [
                'name' => 'admin',
                'mobile' => '0111111111',
                'email' => 'admin@gmail.com',
                'password' => 'mFiQE',
                'level' => 'admin',
                'created_at' => '2023-01-01',
            ],
            [
                'name' => 'suhartini',
                'mobile' => '0628xxxxxx',
                'email' => 'suhartini@gmail.com',
                'password' => 'lH1kT',
                'level' => 'admin',
                'created_at' => '2023-01-01',
            ],
            [
                'name' => 'fey',
                'mobile' => '0628xxxxxx',
                'email' => 'fey@gmail.com',
                'password' => 'Y8%/WV',
                'level' => 'admin',
                'created_at' => '2023-01-01',
            ],
            [
                'name' => 'Rai',
                'mobile' => '081351580524',
                'email' => 'satria@gmail.com',
                'password' => '123',
                'level' => 'member',
                'created_at' => '2023-01-01',
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'mobile' => $user['mobile'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'level' => $user['level'],
                'created_at' => $user['created_at'],
            ]);
        }
    }
}
