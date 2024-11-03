<?php

namespace App\Http\Resources\API;

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
            "UserID"=>$this->UserID,
            "full_name"=>$this->full_name,
            "username"=>$this->username,
            "email"=>$this->email,
            "phone_number"=>$this->phone_number,
            "address"=>$this->address,
            // "created_at"=>$this->created_at,
            // "updated_at"=>$this->updated_at,
        ];
    }
}