<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;


Route::post('/send-transactional-email', [EmailController::class, 'sendEmail']);