<?php

namespace App\Services\API\Exceptions;


use App\Services\APIResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ConflictException extends Exception
{
    public function report()
    {
        // put error in log file
    }
    public function render(Request $request):Response
    {
        return APIResponse::new()->errorConflict($this->getMessage(), [$this->getTrace()]);
    }
}