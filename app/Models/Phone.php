<?php

namespace App\Models;

use App\Support\Address;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Traits\DBQueryBuilder\DBPhone;

class Phone extends Model
{
    use HasFactory, DBPhone;
    
    protected $table = "phone";
    protected $primaryKey = "PhoneID";
    public $incrementing = false;

    public function user() {
        return $this->belongsTo(User::class, "UserID");
    }
    // protected function address(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => new Address($value, " "),
    //     );
    // }
    protected function imei2(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if($value == "imei2"){
                    return null;
                }
                return $value;
            },
        );
    }
    
}
