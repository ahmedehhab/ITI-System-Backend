<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'session_date' => $this->session_date,
            'is_delivered' => $this->is_delivered,
            'engagement'   => $this->whenLoaded('engagement', fn () => [
                'id'                => $this->engagement->id,
                'type'              => $this->engagement->type,
                'hours_per_session' => $this->engagement->hours_per_session,
                'instructor_id'     => $this->engagement->instructor_id,
            ]),
            'created_at'   => $this->created_at,
        ];
    }
}