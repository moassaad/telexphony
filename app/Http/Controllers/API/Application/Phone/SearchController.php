<?php

namespace App\Http\Controllers\API\Application\Phone;

use App\Exceptions\API\InternalServerErrorException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Phone\IMEIRequest;
use App\Http\Resources\API\PaginateResource;
use App\Http\Resources\API\PhoneSearchResource;
use App\Models\Phone;
use App\Services\APIResponse;
use App\Support\IMEI;

class SearchController extends Controller
{
    public function _imei(IMEIRequest $request) {
        $creaditionals = $request->validated();
        $imei = $creaditionals['imei'];
        $result = $this->result_imei($imei);
        return $result;
    }
    
    public function result_imei(string $imei) 
    {
        $imeiCheck = new IMEI();
        $check = $imeiCheck->isValid($imei);
        
        if(!$check)
        {
            throw new InternalServerErrorException(__('_phone.messages.error.valid-imei'));
        }
        $phone = Phone::searchWithIMEI($imei)->paginate();
        // TODO create message
        return APIResponse::new()
            ->successOk(
                "success", 
                new PaginateResource($phone, PhoneSearchResource::class)
        );
    }
}
