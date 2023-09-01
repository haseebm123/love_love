<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MedicalCondition;

class MedicalConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medical_condition = [
            'Chlamydia',
            'Gonorrhea',
            'Syphilis',
            'Herpes',
            'Human papillomavirus (HPV)',
            'Human immunodeficiency virus (HIV)',
            'Trichomoniasis',
            'Hepatitis B',
            'Hepatitis C',
            'Pubic lice (crabs)',
            'Scabies',
            'Genital warts',
            'Others',
            'None'
        ];
        foreach ($medical_condition as $key => $value) {

            MedicalCondition::create(
                [ 'name' => $value]
            );
        };
    }
}
