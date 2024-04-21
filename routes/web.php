<?php

use App\Models\JobOffer\JobOffer;
use App\Models\JobOffer\Salary;
use App\Models\User\Education;
use App\Models\User\Experience;
use App\Models\User\Link;
use App\Models\User\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
