<?php

namespace App\Services\API\Facade\Handle;

interface APIHandle
{
    /**
     * Summary of handle
     * handle format return to response.
     * @return array
     */
    public function handle();
}
