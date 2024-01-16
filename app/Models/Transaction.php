<?php

namespace App\Models;

use App\Traits\HasOrg;
use App\Traits\HasTenant;
use App\Traits\IsOwned\IsOwned;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, HasUuids, HasTenant, HasOrg, IsOwned, SoftDeletes;

    protected $guarded = [];

    protected $dates = [
        'created_by_id',
        'updated_by_id',
        'deleted_by_id'
    ];
}
