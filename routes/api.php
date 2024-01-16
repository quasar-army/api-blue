<?php

use App\Http\Controllers\Api\OrgsController;
use App\Http\Controllers\Api\RolesController;
use App\Http\Controllers\Api\TenantsController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\SanctumController;
use Illuminate\Support\Facades\Route;

Broadcast::routes(['middleware' => ['auth:sanctum']]);

/**
 * Authentication
 */

Route::post('/sanctum/token', [SanctumController::class, 'login'])->name('sanctum.tokenLogin');

/**
 * Password Reset
 */

Route::get('/password-reset-page', [PasswordResetController::class, 'redirectToPasswordResetPage'])->name('password.reset');

Route::middleware(['auth:sanctum', 'user_is_active'])->group(function () {
    /**
     * Auth
     */

    Route::get('/user', [SanctumController::class, 'user']);

    /**
     * JSON Rest Api
     */

    Orion::resource('orgs', OrgsController::class);
    Orion::resource('tenants', TenantsController::class);
    Orion::resource('roles', RolesController::class);

    /**
     * Services
     */

    Route::post('services/roles/attach-role', [RolesController::class, 'attachRole']);
    Route::post('services/roles/detach-role', [RolesController::class, 'detachRole']);
});
