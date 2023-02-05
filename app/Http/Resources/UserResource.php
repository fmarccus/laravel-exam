<?php

namespace App\Http\Resources;

use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'role_id' => $this->role_id,
            'role_name' => $this->role->role_name ?? "No role assigned",
            'full_name' => $this->full_name,
            'email_address' => $this->email_address,
        ];
    }
}
