<?php

namespace App\Services\API\Exceptions;


use App\Services\APIResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ErrorException extends Exception
{
    private array $errors;
    public function __construct($code , string $message = "", $errors)
    {
        parent::__construct($message, $code);
        $this->errors = $errors;
    }
    public function report()
    {
        // put error in log file
    }
    public function render(Request $request):Response
    {
        return APIResponse::new()->error($this->code, $this->getMessage(), [$this->getTrace()]);
    }
}