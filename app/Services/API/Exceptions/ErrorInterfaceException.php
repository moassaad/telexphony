<?php

namespace App\Services\API\Exceptions;

use Illuminate\Http\Request;

interface ErrorInterfaceException
{
    public function report();
    public function render(Request $request);
}