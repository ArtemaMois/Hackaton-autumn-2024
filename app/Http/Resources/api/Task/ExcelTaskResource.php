<?php

namespace App\Http\Resources\api\Task;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExcelTaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'performer' => $this->performer->full_name,
            'creator' => $this->creator->full_name,
            'created_at' => Carbon::make($this->created_at)->format("H:i d-m-Y"),
            'updated_at' => Carbon::make($this->updated_at)->format("H:i d-m-Y")
        ];
    }
}
