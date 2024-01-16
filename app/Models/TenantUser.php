<?php

namespace App\Models;

use App\Traits\HasTenant;
use App\Traits\IsOwned\IsOwned;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TenantUser extends Pivot
{
    use HasFactory, HasUuids, HasTenant, IsOwned;

    protected $table = 'tenant_users';

    protected $guarded = [];

    protected $dates = [
        'created_by_id',
        'updated_by_id',
        'deleted_by_id'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
