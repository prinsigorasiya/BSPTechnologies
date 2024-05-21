<?php
// app/Models/Company.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'logo',
        'services',
        'country_id',
        'state_id',
        'city_id',
        'branches',
    ];

    protected $casts = [
        'services' => 'array',
        'branches' => 'array',
    ];
}
