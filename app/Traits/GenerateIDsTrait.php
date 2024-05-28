<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GenerateIDsTrait {
    public function generateUserID(): string
    {
        return "TELEX-".Str::random(20)."-PHONY";
    }
    public function generatePhoneID(): string
    {
        return "TELE-X-".Str::random(18)."-PHO-NY";
    }
    public function generateReportID(): string
    {
        return "RE-".Str::random(24)."-PORT";
    }
}