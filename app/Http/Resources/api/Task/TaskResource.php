<?php

namespace App\Http\Resources\api\Task;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'title' => $this->body,
            'performer' => [
                'id' => $this->performer->id,
                'name' => $this->performer->full_name
            ],
            'creator' => [
                'id' => $this->creator->id,
                'name' => $this->creator->full_name
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at

        ];
    }
}
