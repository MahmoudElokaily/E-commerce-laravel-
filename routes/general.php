<?php

use App\Http\Controllers\general\GeneralController;
use Illuminate\Support\Facades\Route;

// All General routes


Route::get('error' , [GeneralController::class , 'error'])->name('admin.error');


