<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class BloodDonors extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'blood_donors';

    protected $fillable = [
        'firstName', 'lastName', 'email', 'bloodType', 'address',
        'city', 'postalCode', 'imageUpload', 'medicalDocument',
        'bloodDonationCard', 'nicOrPassport'
    ];
}
