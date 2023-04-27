<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillsResource extends JsonResource
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
            'type' => 'Skills',
            'attributes' => [
                'title' => $this->title,
                'approved' => $this->approved ? true : false,
                'created_by' => $this->created_by ? User::get($this->created_by)?->first_name : null,
                'updated_by' => $this->updated_by ? User::get($this->updated_by)?->first_name : null,
                'created_at' => date('M d, Y - h:i A', strtotime($this->created_at)),
                'updated_at' => date('M d, Y - h:i A', strtotime($this->updated_at)),
            ],
        ];
    }
}
