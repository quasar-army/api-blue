<?php

namespace App\Models;

use App\Traits\HasOrg;
use App\Traits\HasTenant;
use App\Traits\IsOwned\IsOwned;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Org extends Model
{
    use HasFactory, HasUuids, HasTenant, IsOwned, SoftDeletes;

    protected $guarded = [];

    protected $dates = [
        'created_by_id',
        'updated_by_id',
        'deleted_by_id'
    ];

    protected static function booted()
    {
        static::addGlobalScope('scopeToUser', function (Builder $builder) {
            if (!app()->runningInConsole()) {
                $builder->whereHas('users', function (Builder $builder) {
                    $builder->where('org_users.user_id', '=', request()->user()->id);
                });
            }
        });
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function org_users(): HasMany
    {
        return $this->hasMany(\App\Models\OrgUser::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\User::class, 'org_users')
            ->using(OrgUser::class);
    }
}
