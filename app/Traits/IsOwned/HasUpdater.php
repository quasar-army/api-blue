<?php

namespace App\Traits\IsOwned;

use Illuminate\Support\Facades\Request;

trait HasUpdater
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    public static function bootHasUpdater()
    {
        static::updating(function ($model) {
            $user = Request::user();
            $model->updated_by_id = $user ? $user->id : env('SYSTEM_USER_UUID', '759b8f44-7c9e-47b5-a5f4-f25265acac4e');
        });
    }
}
