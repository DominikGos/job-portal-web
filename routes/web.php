<?php

use App\Models\User\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = User::first();
    dump($user->links);

    return view('welcome');
});
