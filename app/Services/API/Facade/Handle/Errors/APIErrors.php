<?php

namespace App\Services\API\Facade\Handle\Errors;

interface APIErrors
{
    /**
     * Summary of error
     * @param array|mixed $errors
     * @param string|mixed $message
     * @return APIHandleError
     */
    public function error($status, $message, $errors);
}
