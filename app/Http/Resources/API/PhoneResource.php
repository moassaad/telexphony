<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
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
            "PhoneID"       =>$this->PhoneID,
            "phone_name"    =>$this->phone_name,
            "model"         =>$this->model,
            "serial_number" =>$this->serial_number,
            "imei"          =>$this->imei,
            "imei2"         =>$this->imei2,
            "created_at"    =>$this->created_at,
            "updated_at"    =>$this->updated_at,
            "UserID"        =>$this->UserID,
        ];
    }
}
