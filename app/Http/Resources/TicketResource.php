<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'date' => $this->date,
            'event_name' => $this->event->name,
            'event_team' => $this->event->teams,
            // 'event_nam' => $this->event->teams->name,


            // 'event_team' => $this->,


            // 'event_name' => $this->event->name,
            // 'event_des' => $this->event->description,
            // 'event_team' => $this->event->teams,



        ];
    }
}
