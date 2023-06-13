<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Intrest;

class IntrestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $intrest = [
            'Movie',
            'Photograph',
            'Design',
            'Reeding Book',
            'Singing',
            'Music'
        ];
        foreach ($intrest as $key => $value) {

            Intrest::create(
                [ 'name' => $value]
            );
        };

    }
}

