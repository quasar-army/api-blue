<?php

namespace App\Http\Controllers\Api;

use App\Models\Tenant;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class TenantsController extends Controller
{
    use DisableAuthorization;

    protected $model = Tenant::class;

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
