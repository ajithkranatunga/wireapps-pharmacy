<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionResource extends JsonResource
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
            'created'=>$this->created,
            'customer'=>new CustomerResource($this->customer),
            'user'=>new UserResource($this->user),
            'medications'=>new MedicationCollection($this->medications),
        ];
    }
}
