<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Validation\Rule;
use Orion\Http\Requests\Request;

class OrgRequest extends Request
{
    public function storeRules(): array
    {
        return [
            'name' => [
                'required',
                'max:100',
                Rule::unique('orgs')
                    ->where(function (Builder $query) {
                        $query->where('tenant_id', $this->tenant_id);
                    })
            ],
        ];
    }

    public function updateRules(): array
    {
        return [
            'name' => [
                'max:100',
                Rule::unique('orgs')
                    ->where(function (Builder $query) {
                        $query->where('tenant_id', $this->tenant_id);
                    })
            ],
        ];
    }
}
