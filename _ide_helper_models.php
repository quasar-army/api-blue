<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Org
 *
 * @property string $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $name
 * @property string $created_by_id
 * @property string|null $updated_by_id
 * @property string|null $deleted_by_id
 * @property string $tenant_id
 * @property-read \App\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrgUser> $org_users
 * @property-read int|null $org_users_count
 * @property-read \App\Models\Tenant $tenant
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Org newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Org newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Org onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Org query()
 * @method static \Illuminate\Database\Eloquent\Builder|Org whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Org whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Org whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Org whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Org whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Org whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Org whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Org whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Org whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Org withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Org withoutTrashed()
 */
	class Org extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrgUser
 *
 * @property string $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $org_id
 * @property string $user_id
 * @property string $created_by_id
 * @property string|null $updated_by_id
 * @property string|null $deleted_by_id
 * @property-read \App\Models\User|null $creator
 * @property-read \App\Models\Org $org
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|OrgUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrgUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrgUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrgUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrgUser whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrgUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrgUser whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrgUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrgUser whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrgUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrgUser whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrgUser whereUserId($value)
 */
	class OrgUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property string $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission withoutRole($roles, $guard = null)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property string $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role withoutPermission($permissions)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tenant
 *
 * @property string $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $name
 * @property string $created_by_id
 * @property string|null $updated_by_id
 * @property string|null $deleted_by_id
 * @property-read \App\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TenantUser> $tenantUsers
 * @property-read int|null $tenant_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereUpdatedById($value)
 */
	class Tenant extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TenantUser
 *
 * @property string $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $tenant_id
 * @property string $user_id
 * @property string $created_by_id
 * @property string|null $updated_by_id
 * @property string|null $deleted_by_id
 * @property-read \App\Models\User|null $creator
 * @property-read \App\Models\Tenant $tenant
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|TenantUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenantUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenantUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenantUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenantUser whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenantUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenantUser whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenantUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenantUser whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenantUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenantUser whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenantUser whereUserId($value)
 */
	class TenantUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property int $access_level
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property bool $is_active
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrgUser> $orgUsers
 * @property-read int|null $org_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Org> $orgs
 * @property-read int|null $orgs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TenantUser> $tenantUsers
 * @property-read int|null $tenant_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tenant> $tenants
 * @property-read int|null $tenants_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAccessLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

