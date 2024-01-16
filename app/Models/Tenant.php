<?php

namespace App\Models;

use App\Traits\IsOwned\IsOwned;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tenant extends Model
{
    use HasFactory, HasUuids, IsOwned;

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
                    $builder->where('tenant_users.user_id', '=', request()->user()->id);
                });
            }
        });
    }

    public function tenantUsers(): HasMany
    {
        return $this->hasMany(\App\Models\TenantUser::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\User::class, 'tenant_users');
    }
}
