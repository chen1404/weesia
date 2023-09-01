<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AplikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $applications = [
            [
                'name' => 'VPNIFY',
                'version' => '1.9.7.7',
                'image' => 'vpnify.png',
                'link' => 'https://drive.google.com/file/d/11d_LDpErd7c5JEfq4FNSEWw6MUpRtocm/view?usp=sharing',
                'category' => 'Other'
            ],
            [
                'name' => 'Clipboard History',
                'version' => '1.1',
                'image' => 'clipboard.png',
                'link' => 'https://drive.google.com/file/d/1ufR8vPveR_bUzqY1g8DFhS2LFhv3m1eZ/view?usp=sharing',
                'category' => 'Other'
            ],
            [
                'name' => 'Multi Parallel',
                'version' => '1.6.21',
                'image' => 'multi-parallel.png',
                'link' => 'https://drive.google.com/file/d/1udiT5oXnaHAOeXxaYIygixq2zL5szcqq/view?usp=sharing',
                'category' => 'Clone'
            ],
            [
                'name' => 'Multi Space',
                'version' => '1.0.5',
                'image' => 'multi-space.png',
                'link' => 'https://drive.google.com/file/d/1Rit6wkj9pnZw5FWE8inorZZ-WUxcRAwK/view?usp=share_link',
                'category' => 'Clone'
            ],
            [
                'name' => 'LINE',
                'version' => '10.17.0',
                'image' => 'line-logo.png',
                'link' => 'https://line.id.uptodown.com/android/download/2628681',
                'category' => 'Line'
            ],
            [
                'name' => 'LINE',
                'version' => '10.17.1',
                'image' => 'line-logo.png',
                'link' => 'https://line.id.uptodown.com/android/download/2636882',
                'category' => 'Line'
            ],
        ];

        foreach($applications as $application) {
            \App\Models\Aplikasi::firstOrCreate($application);
        }
    }
}
