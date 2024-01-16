<?php

namespace App\Traits\IsOwned;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Request;

trait HasCreator
{
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    public static function bootHasCreator()
    {
        static::creating(function ($model) {
            $user = Request::user();
            $model->created_by_id = $user ? $user->id : env('SYSTEM_USER_UUID', '759b8f44-7c9e-47b5-a5f4-f25265acac4e');
        });
    }
}
