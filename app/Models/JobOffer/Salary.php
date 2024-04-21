<?php

namespace App\Models\JobOffer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'from',
        'to',
        'currency',
        'description',
    ];
}
