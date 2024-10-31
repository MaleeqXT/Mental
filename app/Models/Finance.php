<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $fillable = [
        'individual_session_cost',
        'couple_session_cost',
        'note_on_finances',
        'payment_method_1',
        'payment_method_2',
        'payment_method_3',
        'payment_method_4',
        'insurance',
        'npi_multipractice_carrier',
        'npi_expiration_date',
        'note_on_credentials',
        'mental_health_role',
        'credential_type',
        'license_state',
        'license_number',
        'license_expiration_date',
        'education',
        'degree',
        'started_in',
        'ended_in',
        'additional_degree_1',
        'additional_degree_2',
        'user_id',
    ];
}
