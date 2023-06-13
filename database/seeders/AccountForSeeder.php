<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AccountFor;

class AccountForSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relation = [
            'Yourself',
            'Father',
            'Mother',
            'Brother',
            'Sister',
            'Friend',
            'Uncle',
            'Aunt',
            'Others'
        ];
            foreach ($relation as $key => $value) {

                AccountFor::create(
                    [ 'name' => $value]
                );
            };

        }

    }

