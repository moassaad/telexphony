<?php

namespace App\Http\Controllers\Report;
use App\Http\Controllers\Controller;
use App\Http\Requests\Phone\Report\ReportRequest;
use App\Http\Requests\Phone\EditPhoneRequest;
use App\Models\Report;
use App\Support\IMEI;
use App\Support\StatusReport;
use App\Traits\GenerateIDsTrait;
use Illuminate\Support\Facades\Auth;
class ReportController extends Controller
{
    use GenerateIDsTrait;
    public function list($phoneID) {
        if(Auth::check())
        {
            $report = new Report();
            $reports = $report->where(['PhoneID'=>$phoneID])->get();
            $status = new StatusReport();
            return view('phone.report.list',compact(['reports','phoneID','status']));
        }
        return redirect()->back()
            ->with(['error'=>__('_report.messages.error.permission')]);
    }
    
    public function create($phoneID) 
    {
        $statusList = StatusReport::new()->list();
        return view('phone.report.create', compact(['phoneID', 'statusList']));
    }
    
    public function store(ReportRequest $request, $phoneID) 
    {
        $creaditionals = $request->validated();
        $report = new Report();
        
        $report->setRawAttributes([
            'ReportID'       =>  self::generateReportID(),
            'report_text'    =>  $creaditionals['report_text'],
            'status'         =>  $creaditionals['status'],
            'PhoneID'        =>  $phoneID,
        ]);
        
        $checkSavePhone = $report->save();
        if(!$checkSavePhone)
        {
            return redirect()->route('phone.report.create.get',$phoneID)
                ->with(['error'=>__('_report.messages.error.report-save')])
                ->withInput();
        }
        return redirect()->route('phone.report.list',$phoneID)
            ->with(['success'=>__('_report.messages.success.report-save')]);
    }

    public function edit($reportID)
    {
        $statusList = StatusReport::new()->list();
        $report = new Report();
        $report = $report->where(['ReportID'=>$reportID])
                        ->get()->first();
        if(empty($report))
        {
            return redirect()->back()
                ->with(['error'=>__('_report.messages.error.permission')]);
        }
        return view('phone.report.edit', compact(['report', 'statusList']));
    }

    public function update(ReportRequest $request, Report $report)
    {
        $creaditionals = $request->validated();
        
        $report->report_text    =  $creaditionals['report_text'];
        $report->status         =  $creaditionals['status'];

        $checkSaveReport = $report->update();
        if(!$checkSaveReport)
        {
            return redirect()->route('phone.report.edit.get',$report->ReportID)
                ->with(['error'=>__('_report.messages.error.report-update')])->withInput();
        }
        return redirect()->route('phone.report.list',$report->PhoneID)
            ->with(['success'=>__('_report.messages.success.report-update')]);
    }

    public function delete(Report $report)
    {
        $phoneID = $report->PhoneID;
        $checkDelete = $report->delete();
        if(!$checkDelete)
        {
            return redirect()->route('phone.report.list',$phoneID)
                ->with(['error'=>__('_report.messages.error.report-delete')]);
        }
        return redirect()->route('phone.report.list',$phoneID)
            ->with(['success'=>__('_report.messages.success.report-delete')]);
    }
}
