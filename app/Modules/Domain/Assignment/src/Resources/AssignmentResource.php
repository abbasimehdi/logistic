<?php

namespace Logistic\Modules\Domain\Assignment\src\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'license_plate' => $this->license_plate,
            'phone_number' => $this->phone_number, // if different from license_plate
            'type' => $this->type,
            'status' => $this->status,
            'vehicle' => $this->whenLoaded('vehicle'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
