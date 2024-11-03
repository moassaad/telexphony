<?php

namespace App\Http\Controllers\API\Application\Phone;

use App\Exceptions\API\InternalServerErrorException;
use App\Exceptions\API\NotFoundException;
use App\Exceptions\API\UnauthorizedException;
use App\Exceptions\API\ValidationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Phone\EditPhoneRequest;
use App\Http\Requests\Phone\PhoneRequest;
use App\Http\Resources\API\PaginateResource;
use App\Http\Resources\API\PhoneResource;
use App\Models\Phone;
use App\Services\APIResponse;
use App\Support\IMEI;
use App\Traits\GenerateIDsTrait;
use Auth;


class PhoneController extends Controller
{
    use GenerateIDsTrait;
    public function show(string $phoneID)
    {
        $phone = Phone::where(['UserID'=>Auth::user()->UserID, 'PhoneID'=>$phoneID])->first();
        if(empty($phone))
        {
            // TODO create message
            throw new NotFoundException("Not Found Any Phone this id: $phoneID.");
        }
        // TODO create message
        return APIResponse::new()->successOk("success",new PhoneResource($phone));
    }
    public function list() {
        if(!Auth::check())
        {
            throw new UnauthorizedException(__('_phone.messages.error.permission'));
        }
        $phones = Phone::where(['UserID'=>Auth::user()->UserID])->paginate();
        // TODO create message
        return APIResponse::new()->successOk("success",new PaginateResource($phones, PhoneResource::class));
    }

    public function store(PhoneRequest $request) 
    {
        $creaditionals = $request->validated();
        $phone = new Phone();
        $IMEI = new IMEI();
        if(!$IMEI->isValid($creaditionals['imei']))
        {
            throw new ValidationException(__('_phone.messages.error.valid-imei'));
        }
        if(!empty($creaditionals['imei2']))
        {
            if(!$IMEI->isValid($creaditionals['imei2']))
            {
                throw new ValidationException(__('_phone.messages.error.valid-imei2'));
            }
        }
        $phone->setRawAttributes([
            'PhoneID'       =>  self::generatePhoneID(),
            'phone_name'    =>  $creaditionals['phone_name'],
            'model'         =>  $creaditionals['model'],
            'imei'          =>  $creaditionals['imei'],
            'imei2'         =>  empty($creaditionals['imei2'])?"imei2":$creaditionals['imei2'],
            'serial_number' =>  $creaditionals['serial_number'],
            'UserID'        =>  Auth::user()->UserID,
        ]);
        
        $checkSavePhone = $phone->save();
        // $checkSavePhone = false; // error
        // $checkSavePhone = true;
        if(!$checkSavePhone)
        {
            throw new InternalServerErrorException(__('_phone.messages.error.phone-save'));
        }
        return APIResponse::new()
            ->successCreated(
                __('_phone.messages.success.phone-save'), 
                new PhoneResource($phone)
            );
    }

    public function update(EditPhoneRequest $request, Phone $phone)
    {
        $creaditionals = $request->validated();
        $IMEI = new IMEI();
        if(!$IMEI->isValid($creaditionals['imei']))
        {
            throw new ValidationException(__('_phone.messages.error.valid-imei'));
        }
        if(!empty($creaditionals['imei2']))
        {
            if(!$IMEI->isValid($creaditionals['imei2']))
            {
                throw new ValidationException(__('_phone.messages.error.valid-imei2'));
            }
        }

        $phone->phone_name    =  $creaditionals['phone_name'];
        $phone->model         =  $creaditionals['model'];
        $phone->imei          =  $creaditionals['imei'];
        $phone->imei2         =  empty($creaditionals['imei2'])?"imei2":$creaditionals['imei2'];
        $phone->serial_number =  $creaditionals['serial_number'];

        $checkSavePhone = $phone->update();
        // $checkSavePhone = false; // error
        // $checkSavePhone = true;

        if(!$checkSavePhone)
        {
            throw new InternalServerErrorException(__('_phone.messages.error.phone-update'));
        }
        return APIResponse::new()
            ->successOk(
                __('_phone.messages.success.phone-update'), 
                new PhoneResource($phone)
        );
    }

    public function delete(Phone $phone)
    {
        $checkDelete = $phone->delete();
        // $checkDelete = false; // error
        // $checkDelete = true;
        if(!$checkDelete)
        {
            throw new InternalServerErrorException(__('_phone.messages.error.phone-delete'));
        }
        return APIResponse::new()
        ->successOk(
            __('_phone.messages.success.phone-delete'), 
            new PhoneResource($phone)
        );
    }
}
