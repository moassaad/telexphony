<?php

namespace App\Http\Controllers\API\Application\Report;
use App\Exceptions\API\InternalServerErrorException;
use App\Exceptions\API\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Phone\Report\ReportRequest;
use App\Http\Requests\Phone\EditPhoneRequest;
use App\Http\Resources\API\PaginateResource;
use App\Http\Resources\API\ReportResource;
use App\Models\Report;
use App\Services\APIResponse;
use App\Support\IMEI;
use App\Support\StatusReport;
use App\Traits\GenerateIDsTrait;
use Illuminate\Support\Facades\Auth;
class ReportController extends Controller
{
    use GenerateIDsTrait;
    public function statusList()
    {
        $status = new StatusReport();
        // TODO create message
        return APIResponse::new()->successOk("status list",$status->list());
    }
    public function show(string $reportID) 
    {
        $report = Report::find($reportID);
        if(empty($report))
        {
            // TODO create message
            throw new NotFoundException("not found report.");
        }
        return APIResponse::new()->successOk("success", new ReportResource($report));
    }
    public function list(string $phoneID) 
    {
        $reports = Report::where(['PhoneID'=>$phoneID])->paginate();
        // TODO create message
        return APIResponse::new()->successOk(
            "success",
            new PaginateResource($reports, ReportResource::class)
        );
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
        // $checkSavePhone = false; // error
        // $checkSavePhone = true;
        if(!$checkSavePhone)
        {
            throw new InternalServerErrorException(__('_report.messages.error.report-save'));
        }
        return APIResponse::new()
            ->successCreated(
                __('_report.messages.success.report-save'),
                new ReportResource($report)
        );
    }
    public function update(ReportRequest $request, Report $report)
    {
        $creaditionals = $request->validated();
        
        $report->report_text    =  $creaditionals['report_text'];
        $report->status         =  $creaditionals['status'];

        $checkSaveReport = $report->update();
        // $checkSaveReport = false; // error
        // $checkSaveReport = true;
        if(!$checkSaveReport)
        {
            throw new InternalServerErrorException(__('_report.messages.error.report-update'));
        }
        return APIResponse::new()
            ->successCreated(
                __('_report.messages.success.report-update'),
                new ReportResource($report)
        );
    }
    public function delete(Report $report)
    {
        $checkDelete = $report->delete();
        // $checkDelete = false; // error
        // $checkDelete = true;
        if(!$checkDelete)
        {
            throw new InternalServerErrorException(__('_report.messages.error.report-delete'));
        }
        return APIResponse::new()
            ->successCreated(
                __('_report.messages.success.report-delete'),
                new ReportResource($report)
        );
    }
}
