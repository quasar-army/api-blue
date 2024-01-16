<?php

namespace App\Traits;

use App\Models\Scopes\ScopeToTenant;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasTenant
{
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    public static function bootHasTenant()
    {
        static::addGlobalScope(new ScopeToTenant);

        static::saving(function ($model) {
            if ($model->tenant_id) {
                return;
            }
            $model->tenant_id = request()->header('tenant-id') ?
                request()->header('tenant-id') :
                env('DEFAULT_TENANT_UUID', '1b775ab2-a303-4b6b-867c-77ca3be2eb75');
        });
    }
}
