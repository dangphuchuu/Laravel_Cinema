<?php

use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('staff', [StaffController::class, 'index']);
