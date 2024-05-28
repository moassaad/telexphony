<?php

namespace App\Http\Controllers\Phone;
use App\Http\Controllers\Controller;
use App\Http\Requests\Phone\IMEIRequest;
use App\Models\Phone;
use App\Support\Address;
use App\Support\IMEI;
use DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function _imei(IMEIRequest $request) {
        $creaditionals = $request->validated();
        return redirect()->route('phone.search.imei.get',$creaditionals);
    }
    
    public function result_imei(Request $request) {
        if($request->imei)
        {
            $imei = $request->imei;
            $imeiCheck = new IMEI();
            $check = $imeiCheck->isValid($imei);
            if($check)
            {
                $phone = new Phone();
                $table = $phone->getWithIMEI($imei);
                return view('phone.search', compact(['imei', 'table']));
            }
            return back()
                ->with(['error'=>__('_phone.messages.error.valid-imei')]);
        }
        return back()
            ->with(['error'=>__('_phone.messages.error.valid-imei')]);
    }
}
