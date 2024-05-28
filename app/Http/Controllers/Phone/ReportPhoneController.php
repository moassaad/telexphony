<?php

namespace App\Http\Controllers\Phone;
use App\Http\Controllers\Controller;
use App\Http\Requests\Phone\ReportPhoneRequest;
use App\Models\Phone;
use App\Models\Report;
use App\Support\IMEI;
use App\Support\StatusReport;
use App\Traits\GenerateIDsTrait;
// use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportPhoneController extends Controller
{
    use GenerateIDsTrait;

    public function report_phone(Request $request) {
        $statusList = StatusReport::new()->list();
        return view('phone.report-phone', compact(['statusList']));
    }

    public function store_report_phone(ReportPhoneRequest $request) {

        $creaditionals = $request->validated();
        $phone = new Phone();
        $report = new Report();
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
        if($checkSavePhone)
        {
            $checkSaveReport = $report->save();
            if($checkSaveReport)
            {
                return redirect()
                    ->route('phone.list')
                    ->with(['success'=>__('_report.messages.success.report-save')]);
            }
            return redirect()
                ->route('phone.list')
                ->with(['error'=>__('_report.messages.error.report-save')]);
        }
        return redirect()
            ->route('phone.list')
            ->with(['error'=>__('_phone.messages.error.phone-save')]);
    }
}
