<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class PhoneSearchResource extends JsonResource
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
            // User
            "UserID"        =>$this->UserID,
            "full_name"     =>$this->full_name,
            "phone_number"  =>$this->phone_number,

            // Phone
            "PhoneID"       =>$this->PhoneID,
            "phone_name"    =>$this->phone_name,
            "model"         =>$this->model,
            "serial_number" =>$this->serial_number,
            "imei"          =>$this->imei,
            "imei2"         =>$this->imei2,

            //Report
            "ReportID"      =>$this->ReportID,
            "report_text"   =>$this->report_text,
            "status"        =>$this->report_text,
            "updated_at"    =>$this->updated_at,
        ];
    }
}
