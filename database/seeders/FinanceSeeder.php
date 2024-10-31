<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinanceSeeder extends Seeder
{
    public function run()
    {
        DB::table('finances')->insert([
            [
                'individual_session_cost' => 100,
                'couple_session_cost' => 150,
                'note_on_finances' => 'Initial consultation cost applies.',
                'payment_method_1' => 'Credit Card',
                'payment_method_2' => 'PayPal',
                'payment_method_3' => 'Bank Transfer',
                'payment_method_4' => 'Cash',
                'insurance' => 'Yes',
                'npi_multipractice_carrier' => 'ABC Insurance',
                'npi_expiration_date' => '2025-12-31',
                'note_on_credentials' => 'Licensed mental health professional.',
                'mental_health_role' => 'Therapist',
                'credential_type' => 'LPC',
                'license_state' => 'NY',
                'license_number' => '123456',
                'license_expiration_date' => '2025-06-30',
                'education' => 'Psychology',
                'degree' => 'PhD',
                'started_in' => '2010-09-01',
                'ended_in' => '2015-06-30',
                'additional_degree_1' => 'Clinical Psychology',
                'additional_degree_2' => 'Counseling',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'individual_session_cost' => 120,
                'couple_session_cost' => 180,
                'note_on_finances' => 'No insurance coverage available.',
                'payment_method_1' => 'Credit Card',
                'payment_method_2' => 'Insurance',
                'payment_method_3' => 'Online Payment',
                'payment_method_4' => null,
                'insurance' => 'No',
                'npi_multipractice_carrier' => 'XYZ Health',
                'npi_expiration_date' => '2026-01-01',
                'note_on_credentials' => 'Specializes in trauma therapy.',
                'mental_health_role' => 'Counselor',
                'credential_type' => 'LMFT',
                'license_state' => 'CA',
                'license_number' => '654321',
                'license_expiration_date' => '2026-05-01',
                'education' => 'Social Work',
                'degree' => 'MSW',
                'started_in' => '2012-01-01',
                'ended_in' => '2016-01-01',
                'additional_degree_1' => 'Marriage and Family Therapy',
                'additional_degree_2' => null,
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
