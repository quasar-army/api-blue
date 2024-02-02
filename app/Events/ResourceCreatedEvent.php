<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ResourceCreatedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public $data,
    ) {
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn(): Channel
    {
        $entityName = with(new $this->data)->getTable();
        $tenantId = $this->data->tenant_id;
        $orgId = $this->data->org_id;
        return new PrivateChannel("$entityName.$tenantId.$orgId");
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        $entityName = with(new $this->data)->getTable();
        return "$entityName.created";
    }
}
