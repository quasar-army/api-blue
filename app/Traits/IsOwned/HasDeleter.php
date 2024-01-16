<?php

namespace App\Traits\IsOwned;

use Illuminate\Support\Facades\Request;

trait HasDeleter
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    public static function bootHasDeleter()
    {
        static::deleting(function ($model) {
            $user = Request::user();
            $model->deleted_by_id = $user ? $user->id : env('SYSTEM_USER_UUID', '759b8f44-7c9e-47b5-a5f4-f25265acac4e');
        });
    }
}
