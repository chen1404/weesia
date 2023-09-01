<?php

namespace Database\Seeders;

use App\Models\Absen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $absens = [
            [
                'date' => '01 Desember 2023',
                'count_clone' => '0',
                'count_bot' => '0',
                'count_alpha' => '0',
                'created_at' => '2023-01-01',
            ],
            // [
            //     'date' => '17 Desember 2022',
            //     'count_clone' => '12',
            //     'count_bot' => '0',
            //     'count_alpha' => '1',
            //     'created_at' => '2022-12-17',
            // ],
            // [
            //     'date' => '18 Desember 2022',
            //     'count_clone' => '14',
            //     'count_bot' => '23',
            //     'count_alpha' => '0',
            //     'created_at' => '2022-12-18',
            // ],
            // [
            //     'date' => '25 Desember 2022',
            //     'count_clone' => '13',
            //     'count_bot' => '43',
            //     'created_at' => '2022-12-25',
            // ],
        ];

        foreach($absens as $absen) {
            Absen::create([
                'date' => $absen['date'],
                'count_clone' => $absen['count_clone'],
                'count_bot' => $absen['count_bot'],
                'count_alpha' => $absen['count_alpha'],
                'created_at' => $absen['created_at'],
            ]);
        }
    }
}
