<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class RolesController extends Controller
{
    use DisableAuthorization;
    use DisablePagination;

    protected $model = Role::class;

    public function includes(): array
    {
        return ['permissions'];
    }

    public function sortableBy(): array
    {
        return ['*'];
    }

    protected function buildFetchQuery(Request $request, array $requestedRelations): Builder
    {
        $query = parent::buildFetchQuery($request, $requestedRelations);

        $query->whereHas('users', function ($query) use ($request) {
            $query->where('id', $request->user()->id);
        });

        return $query;
    }

    public function attachRole(Request $request)
    {
        $request->validate([
            'name' => 'required|exists:roles,name',
            'user_id' => 'required'
        ]);
        $targetUser = User::findOrFail($request->user_id);

        abort_unless(
            $request->user()->can("assign role '$request->name'"),
            401,
            'do not have permission to assign this role'
        );
        abort_unless(
            $request->user()->access_level > $targetUser->access_level || $request->user()->hasRole('Global Admin'),
            401,
            "access level too low to assign role to this user"
        );

        $targetUser->assignRole($request->name);
    }

    public function detachRole(Request $request)
    {
        $request->validate([
            'name' => 'required|exists:roles,name',
            'user_id' => 'required'
        ]);
        $targetUser = User::findOrFail($request->user_id);

        abort_unless(
            $request->user()->can("assign role '$request->name'"),
            401,
            'do not have permission to detach this role'
        );
        abort_unless(
            $request->user()->access_level > $targetUser->access_level || $request->user()->hasRole('Global Admin'),
            401,
            "access level too low to detach role to this user"
        );

        $targetUser->removeRole($request->name);
    }
}
