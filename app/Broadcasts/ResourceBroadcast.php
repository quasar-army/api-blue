<?php

namespace App\Broadcasts;

use App\Models\User;
use App\Observers\BroadcastResourceObserver;
use Illuminate\Support\Facades\Broadcast;

class ResourceBroadcast
{
    public string $EloquentModel;

    public function __construct(string $eloquentModel)
    {
        $this->EloquentModel = $eloquentModel;
    }

    public function register()
    {
        $this->registerObservers();
        $this->registerChannels();
    }

    public function registerChannels()
    {
        $entityName = with(new $this->EloquentModel)->getTable();
        Broadcast::channel(
            "$entityName.{tenantId}.{orgId}",
            function (User $user, string $tenantId, string $orgId) {
                return $user->hasTenant($tenantId) && $user->hasOrg($orgId);
            }
        );
    }

    public function registerObservers()
    {
        $this->EloquentModel::observe(BroadcastResourceObserver::class);
    }
}
