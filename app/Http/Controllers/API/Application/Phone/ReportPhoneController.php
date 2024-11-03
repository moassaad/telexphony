<?php

namespace App\Http\Controllers\API\Application\Phone;

use App\Exceptions\API\InternalServerErrorException;
use App\Exceptions\API\ValidationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Phone\ReportPhoneRequest;
use App\Http\Resources\API\PhoneResource;
use App\Http\Resources\API\ReportResource;
use App\Models\Phone;
use App\Models\Report;
use App\Services\APIResponse;
use App\Support\IMEI;
use App\Support\StatusReport;
use App\Traits\GenerateIDsTrait;
use Auth;
use Illuminate\Http\Request;

class ReportPhoneController extends Controller
{
    use GenerateIDsTrait;

    // public function report_phone(Request $request) {
    //     $statusList = StatusReport::new()->list();
    //     return view('phone.report-phone', compact(['statusList']));
    // }

    public function store_report_phone(ReportPhoneRequest $request) {

        $creaditionals = $request->validated();
        $phone = new Phone();
        $report = new Report();
        $checkIMEI = new IMEI();
        if(!$checkIMEI->isValid($creaditionals['imei']))
        {
            throw new ValidationException(__('_phone.messages.error.valid-imei'));
            // return back()
            //     ->with(['error'=>__('_phone.messages.error.valid-imei')])
            //     ->withInput();
        }
        if(!empty($creaditionals['imei2']))
        {
            if(!$checkIMEI->isValid($creaditionals['imei2']))
            {
            throw new ValidationException(__('_phone.messages.error.valid-imei2'));
                // return back()
                //     ->with(['error'=>__('_phone.messages.error.valid-imei2')])
                //     ->withInput();
            }
            
        }
        $phoneID = self::generatePhoneID();
        $reportID = self::generatePhoneID();

        $phone->setRawAttributes([
            'PhoneID'       =>  $phoneID,
            'phone_name'    =>  $creaditionals['phone_name'],
            'model'         =>  $creaditionals['model'],
            'imei'          =>  $creaditionals['imei'],
            'imei2'         =>  empty($creaditionals['imei2'])?"imei2":$creaditionals['imei2'],
            'serial_number' =>  $creaditionals['serial_number'],
            'UserID'        =>  Auth::user()->UserID,
        ]);
        $report->setRawAttributes([
            'ReportID'      =>  $reportID,
            'status'        =>  $creaditionals['status'],
            'report_text'   =>  $creaditionals['report_text'],
            'PhoneID'       =>  $phoneID,
        ]);
        
        $checkSavePhone = $phone->save();
        // $checkSavePhone = false; // error
        // $checkSavePhone = true;
        if(!$checkSavePhone)
        {
            throw new InternalServerErrorException(__('_phone.messages.error.phone-save'));
        }
        $checkSaveReport = $report->save();
        // $checkSaveReport = false; // error
        // $checkSaveReport = true;
        if(!$checkSaveReport)
        {
            throw new InternalServerErrorException(__('_report.messages.error.report-save'));
        }
        return APIResponse::new()
            ->successCreated(
                __('_report.messages.success.report-save'),
                [
                    'phone'=>new PhoneResource($phone),
                    'report'=>new ReportResource($report),
                ]
        );
    }
}
