<?php

namespace App\Http\Controllers\Phone;
use App\Http\Controllers\Controller;
use App\Http\Requests\Phone\PhoneRequest;
use App\Http\Requests\Phone\EditPhoneRequest;
use App\Models\Phone;
use App\Support\IMEI;
use App\Traits\GenerateIDsTrait;
use Illuminate\Support\Facades\Auth;
class PhoneController extends Controller
{
    use GenerateIDsTrait;
    public function list() {
        if(Auth::check())
        {
            $phone = new Phone();
            $phones = $phone->where(['UserID'=>Auth::user()->UserID])->get();
            return view('phone.list',compact(['phones']));
        }
        return redirect()->back()->with(['error'=>__('_phone.messages.error.permission')]);
    }

    public function create() 
    {
        return view('phone.create');
    }

    public function store(PhoneRequest $request) 
    {
        $creaditionals = $request->validated();
        $phone = new Phone();
        $checkIMEI = new IMEI();
        if(!$checkIMEI->isValid($creaditionals['imei']))
        {
            return back()
                ->with(['error'=>__('_phone.messages.error.valid-imei')])
                ->withInput();
        }
        if(!empty($creaditionals['imei2']))
        {
            if(!$checkIMEI->isValid($creaditionals['imei2']))
            {
                return back()
                    ->with(['error'=>__('_phone.messages.error.valid-imei2')])
                    ->withInput();
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
        if(!$checkSavePhone)
        {
            return redirect()->route('phone.create')
                ->with(['error'=>__('_phone.messages.error.phone-save')])
                ->withInput();
        }
        return redirect()->route('phone.list')
            ->with(['success'=>__('_phone.messages.success.phone-save')]);
    }

    public function edit($phoneID)
    {
        $phone = new Phone();
        $phone = $phone->where(['PhoneID'=>$phoneID, 'UserID'=>Auth::user()->UserID])
                        ->get()->first();
        if(empty($phone))
        {
            return redirect()->back()->with(['error'=>__('_phone.messages.error.permission')]);
        }
        return view('phone.edit', compact(['phone']));
    }

    public function update(EditPhoneRequest $request, Phone $phone)
    {
        $creaditionals = $request->validated();
        $checkIMEI = new IMEI();
        if(!$checkIMEI->isValid($creaditionals['imei']))
        {
            return back()
                ->with(['error'=>__('_phone.messages.error.valid-imei')])
                ->withInput();
        }
        if(!empty($creaditionals['imei2']))
        {
            if(!$checkIMEI->isValid($creaditionals['imei2']))
            {
                return back()
                    ->with(['error'=>__('_phone.messages.error.valid-imei2')])
                    ->withInput();
            }
        }

        $phone->phone_name    =  $creaditionals['phone_name'];
        $phone->model         =  $creaditionals['model'];
        $phone->imei          =  $creaditionals['imei'];
        $phone->imei2         =  empty($creaditionals['imei2'])?"imei2":$creaditionals['imei2'];
        $phone->serial_number =  $creaditionals['serial_number'];

        $checkSavePhone = $phone->save();

        if(!$checkSavePhone)
        {
            return redirect()->route('phone.edit')
                ->with(['error'=>__('_phone.messages.error.phone-update')])
                ->withInput();
        }
        return redirect()->route('phone.list')
            ->with(['success'=>__('_phone.messages.success.phone-update')]);
    }

    public function delete(Phone $phone)
    {
        $checkDelete = $phone->delete();
        if(!$checkDelete)
        {
            return redirect()->route('phone.list')
                ->with(['error'=>__('_phone.messages.error.phone-delete')]);
        }
        return redirect()->route('phone.list')
            ->with(['success'=>__('_phone.messages.success.phone-delete')]);
    }
}
