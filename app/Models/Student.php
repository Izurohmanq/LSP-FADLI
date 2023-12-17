<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    
    protected $fillable = [
        'full_name',
        'id_card_address',
        'current_address',
        'district',
        'regency',
        'province',
        'phone_number',
        'email',
        'nationality_status',
        'foreign_nationality',
        'birth_date',
        'birth_place',
        'gender',
        'marital_status',
        'religion',
        'document_path',
        'registration_status',
    ];

    // You may also want to define accessors, mutators, and relationships here.
}

