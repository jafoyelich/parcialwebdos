<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YesNoController;

Route::get('/', [YesNoController::class, 'index']);
Route::get('/get-answer', [YesNoController::class, 'getAnswer']);
