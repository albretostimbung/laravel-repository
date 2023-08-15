<?php

use App\Http\Controllers\API\V1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::apiResource('roles', V1\Roles\RoleController::class);
    Route::apiResource('users', V1\Users\UserController::class);
});
