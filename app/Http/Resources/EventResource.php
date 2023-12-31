<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use function Symfony\Component\Translation\t;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
       'id'=> $this->id,
       'name' => $this->name,
       'description'=>$this->description,
       'startTime'=>$this->start_time,
        'endTime'=>$this->end_time,
            'user'=> new UserResource($this->whenLoaded('user')),
            'attendees'=> AttendeeResource::collection(
                $this->whenLoaded('attendees'))


        ];
    }
}
