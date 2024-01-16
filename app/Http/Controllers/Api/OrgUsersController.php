<?php

namespace App\Http\Controllers\Api;

use App\Models\OrgUser;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class OrgUsersController extends Controller
{
    use DisableAuthorization;

    protected $model = OrgUser::class;

    public function filterableBy(): array
    {
        return ['*'];
    }

    public function includes(): array
    {
        return ['*'];
    }

    public function sortableBy(): array
    {
        return ['*'];
    }

    public function aggregates(): array
    {
        return ['*'];
    }
}
