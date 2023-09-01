<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekapanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recaps = [
            [
                'title' => 'Tugas 096',
                'date' => '1 Juli 2022 - 15 Juli 2022',
                'link' => 'https://drive.google.com/file/d/19ShzgvY6Muo0RwBA1LGHqqehmqFJe5LM/view?usp=sharing'
            ],
            [
                'title' => 'Tugas 097',
                'date' => '16 Juli 2022 - 31 Juli 2022',
                'link' => 'https://drive.google.com/file/d/1gTMMy5bUWl31W36LdDDXfKL5VMVzrrz4/view?usp=sharing'
            ],
            [
                'title' => 'Tugas 098',
                'date' => '1 Agustus 2022 - 15 Agustus 2022',
                'link' => 'https://drive.google.com/file/d/1kIx3_57vQ8EQmKgTggNJWEwdFw4pLpdr/view?usp=sharing'
            ],
            [
                'title' => 'Tugas 099',
                'date' => '16 Agustus 2022 - 31 Agustus 2022',
                'link' => 'https://drive.google.com/file/d/1AXx4hi2qFhLZ1adwFvzfu740hPG5A0HH/view?usp=sharing'
            ],
            [
                'title' => 'Tugas 100',
                'date' => '1 September 2022 - 15 September 2022',
                'link' => 'https://drive.google.com/file/d/1OLRpvLBSrXm9k90TzekaQyvFW6i9FdOY/view?usp=sharing'
            ],
            [
                'title' => 'Tugas 101',
                'date' => '15 September 2022 - 30 September 2022',
                'link' => 'https://drive.google.com/file/d/1TEEnZSGXe526bwCEB5fP8NP_ZQejXBrQ/view?usp=sharing'
            ],
            [
                'title' => 'Tugas 102',
                'date' => '1 Oktober 2022 - 15 Oktober 2022',
                'link' => 'https://drive.google.com/file/d/1BhlqQaNpZrrr_1zswzam4-_W9dIoxB84/view?usp=sharing'
            ],
            [
                'title' => 'Tugas 103',
                'date' => '16 Oktober 2022 - 31 Oktober 2022',
                'link' => 'https://drive.google.com/file/d/1148Ij-_WTLS79rc82JpwxbC-w0hQr1UZ/view?usp=share_link'
            ],
            [
                'title' => 'Tugas 104',
                'date' => '1 September 2022 - 15 September 2022',
                'link' => 'https://drive.google.com/file/d/1CRmKNxjgPxcA9brB66k5KXTzSpM246ae/view?usp=share_link'
            ],
            [
                'title' => 'Tugas 105',
                'date' => '15 September 2022 - 30 September 2022',
                'link' => 'https://drive.google.com/file/d/1n9SPGmcJrduc8R9lJE78_ao5Tp0Xz0LW/view?usp=share_link'
            ],
        ];
        
        foreach($recaps as $recap) {
            \App\Models\Rekapan::firstOrCreate($recap);
        }
    }
}
