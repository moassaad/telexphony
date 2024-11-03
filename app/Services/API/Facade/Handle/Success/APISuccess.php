<?php

namespace App\Services\API\Facade\Handle\Success;

interface APISuccess
{
    /**
     * Summary of success
     * @param mixed $status
     * @param mixed $data
     * @param mixed $message
     * @return APIHandleSuccess
     */
    public function success($status, $data, $message);
}
