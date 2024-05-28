<?php

namespace App\Models;

use App\Support\StatusReport;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    
    protected $table = "report";
    protected $primaryKey = "ReportID";
    public $incrementing = false;

    // protected function status(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => $value,
    //         set: fn ($value) => StatusReport::create($value)->status
    //     );
    // }

}
