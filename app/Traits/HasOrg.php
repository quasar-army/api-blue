<?php

namespace App\Traits;

use App\Models\Org;
use App\Models\Scopes\ScopeToOrg;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasOrg
{
    public function org(): BelongsTo
    {
        return $this->belongsTo(Org::class);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    public static function bootHasOrg()
    {
        static::addGlobalScope(new ScopeToOrg);

        static::creating(function ($model) {
            if ($model->org_id) {
                return;
            }
            $model->org_id = request()->header('org-id');
        });
    }
}
