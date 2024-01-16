<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function tenants(): BelongsToMany
    {
        return $this->belongsToMany(Tenant::class, 'tenant_users')
            ->using(TenantUser::class);
    }

    public function tenantUsers(): HasMany
    {
        return $this->hasMany(\App\Models\TenantUser::class);
    }

    public function hasTenant(string $tenantId)
    {
        return !!TenantUser::firstWhere([
            'tenant_id' => $tenantId,
            'user_id' => $this->id,
        ]);
    }

    public function orgs(): BelongsToMany
    {
        return $this->belongsToMany(Org::class, 'org_users')
            ->using(OrgUser::class);
    }

    public function orgUsers(): HasMany
    {
        return $this->hasMany(\App\Models\OrgUser::class);
    }

    public function hasOrg(string $orgId)
    {
        return !!OrgUser::firstWhere([
            'org_id' => $orgId,
            'user_id' => $this->id,
        ]);
    }

    public function sharesTenantWith(User $targetUser)
    {
        $targetUsersTenants = $targetUser->tenants->pluck('id');
        $thisUsersTenants = $this->tenants->pluck('id');
        return !!$targetUsersTenants
            ->intersect($thisUsersTenants)
            ->count();
    }

    public function sharesOrgWith(User $targetUser)
    {
        $targetUsersOrgs = $targetUser->orgs->pluck('id');
        $thisUsersOrgs = $this->orgs->pluck('id');

        return !!$targetUsersOrgs
            ->intersect($thisUsersOrgs)
            ->count();
    }

    public function sharesOrgAndTenantWith(User $targetUser)
    {
        return $this->sharesTenantWith($targetUser) &&
            $this->sharesOrgWith($targetUser);
    }

    public function sharesOrgOrTenantWith(User $targetUser)
    {
        return $this->sharesTenantWith($targetUser) ||
            $this->sharesOrgWith($targetUser);
    }
}
