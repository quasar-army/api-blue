<?php

namespace App\Observers;

use App\Events\ResourceCreatedEvent;
use App\Events\ResourceRemovedEvent;
use App\Events\ResourceUpdatedEvent;

class BroadcastResourceObserver
{
    public function created($resource)
    {
        $event = new ResourceCreatedEvent($resource);
        $event->dispatch($resource);
    }

    public function updated($resource)
    {
        $event = new ResourceUpdatedEvent($resource);
        $event->dispatch($resource);
    }

    public function deleted($resource)
    {
        $event = new ResourceRemovedEvent($resource);
        $event->dispatch($resource);
    }
}
