<?php

namespace App\Services\API\Facade\Cases;

use App\Services\API\Facade\Http\HTTPStatus;

abstract class APICases
{
    /**
     * Success
     */
    public const OK = HTTPStatus::OK;
    public const CREATED = HTTPStatus::CREATED;
    public const NO_CONTENT = HTTPStatus::NO_CONTENT;

    /**
     * Redirection
     */
    public const NOT_MODIFIED = HTTPStatus::NOT_MODIFIED;
    
    /**
     * Client Error
     */
    public const BAD_REQUEST = HTTPStatus::BAD_REQUEST;
    public const UNAUTHORIZED = HTTPStatus::UNAUTHORIZED;
    public const FORBIDDEN = HTTPStatus::FORBIDDEN;
    public const NOT_FOUND = HTTPStatus::NOT_FOUND;
    public const CONFLICT = HTTPStatus::CONFLICT;

    /**
     * Server Error
     */
    public const INTERNAL_SERVER_ERROR = HTTPStatus::INTERNAL_SERVER_ERROR;
}
