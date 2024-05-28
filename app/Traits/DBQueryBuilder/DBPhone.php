<?php

namespace App\Traits\DBQueryBuilder;
use DB;

trait DBPhone {
    public function getWithIMEI($imei) 
    {
        $search = DB::raw("
            SELECT 
                user.UserID,
                user.full_name,
                user.phone_number, 
                phone.PhoneID, 
                phone.phone_name, 
                phone.model, 
                phone.serial_number, 
                phone.imei, 
                phone.imei2,
                report.ReportID, 
                report.report_text, 
                report.status, 
                report.updated_at 
            FROM phone
            INNER JOIN user 
                ON phone.UserID = user.UserID
            INNER JOIN report 
                ON report.PhoneID = phone.PhoneID
            WHERE 
                phone.imei = '$imei' OR phone.imei2 = '$imei';
        ");
        return DB::select($search);
    }

    public function getPhoneList($UserID) 
    {
        $search = DB::raw("
            SELECT 
                phone.PhoneID, 
                phone.phone_name, 
                phone.model, 
                phone.serial_number, 
                phone.imei, 
                phone.imei2,
                phone.updated_at, 
                report.status 
            FROM phone
            INNER JOIN report 
                ON report.PhoneID = phone.PhoneID
            WHERE 
                phone.UserID = '$UserID';
        ");
        return DB::select($search);
    }
}