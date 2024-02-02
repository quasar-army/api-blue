<?php

namespace App\Providers;

use App\Broadcasts\ResourceBroadcast;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // (new ResourceBroadcast(SomeClass::class))->register();

        Broadcast::routes();

        require base_path('routes/channels.php');
    }
}
