<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class TenantRequest extends Request
{
    public function storeRules(): array
    {
        return [
            'name' => 'required|unique:tenants|max:100',
        ];
    }

    public function updateRules(): array
    {
        return [
            'name' => 'unique:tenants|max:100',
        ];
    }
}
