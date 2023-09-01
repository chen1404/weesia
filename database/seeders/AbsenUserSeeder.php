<?php

namespace Database\Seeders;

use App\Models\AbsenUsers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsenUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $absenUser = [
            [
                'status' => 'pass',
                'status_desc' => 'Alpha',
                'absen_id' => '1',
                'user_id' => '4',
                'created_at' => '2023-01-01',
            ],
            // [
            //     'work' => 'WFH',
            //     'task' => 'Bot',
            //     'task_desc' => '31',
            //     'status' => 'done',
            //     'status_desc' => 'Hadir',
            //     'absen_id' => '1',
            //     'user_id' => '2',
            //     'created_at' => '2022-12-16',
            // ],
            // [
            //     'status' => 'pass',
            //     'status_desc' => 'Alpha',
            //     'absen_id' => '1',
            //     'user_id' => '4',
            //     'created_at' => '2022-12-16',
            // ],
            // [
            //     'status' => 'pass',
            //     'status_desc' => 'Alpha',
            //     'absen_id' => '2',
            //     'user_id' => '2',
            //     'created_at' => '2022-12-17',
            // ],
            // [
            //     'work' => 'WFO',
            //     'task' => 'Clone',
            //     'task_desc' => '12',
            //     'status' => 'done',
            //     'status_desc' => 'Telat',
            //     'absen_id' => '2',
            //     'user_id' => '4',
            //     'created_at' => '2022-12-17',
            // ],
            // [
            //     'work' => 'Izin',
            //     'task' => 'Clone',
            //     'task_desc' => '14',
            //     'status' => 'done',
            //     'status_desc' => 'Telat',
            //     'absen_id' => '3',
            //     'user_id' => '2',
            //     'created_at' => '2022-12-18',
            // ],
            // [
            //     'work' => 'WFO',
            //     'task' => 'Bot',
            //     'task_desc' => '23',
            //     'status' => 'done',
            //     'status_desc' => 'Hadir',
            //     'absen_id' => '3',
            //     'user_id' => '4',
            //     'created_at' => '2022-12-18',
            // ],
        ];

        foreach($absenUser as $user) {
            AbsenUsers::firstOrCreate($user);
        }
    }
}
