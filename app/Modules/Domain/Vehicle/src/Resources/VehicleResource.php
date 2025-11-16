<?php

namespace Logistic\Modules\Domain\Vehicle\src\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'plate_number' => $this->plate_number, // if different from license_plate
            'type' => $this->type,
            'status' => $this->status,
            'driver' => $this->whenLoaded('driver'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
