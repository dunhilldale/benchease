<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
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
            'type' => 'Users',
            'attributes' => [
                'employee_id' => $this->employee_id,
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone_1' => $this->phone_1,
                'phone_2' => $this->phone_2,
                'address' => $this->address,
                'website' => $this->website,
                'type' => $this->type,
                'is_new' => $this->is_new,
                'created_at' => date('M d, Y - h:i A', strtotime($this->created_at)),
                'updated_at' => date('M d, Y - h:i A', strtotime($this->updated_at)),
            ],
        ];
    }
}
