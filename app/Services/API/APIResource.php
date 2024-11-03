<?php

namespace App\Services\API;

use App\Services\API\Facade\Handle\Errors\APIHandleError;
use App\Services\API\Facade\Handle\Success\APIHandleSuccess;

class APIResource
{
    private $success;
    private $error;
    public function __construct()
    {
        $this->success = new APIHandleSuccess();
        $this->error = new APIHandleError();
    }
    public static function new()
    {
        return new self();
    }
    /**
     * Summary of success
     * @param mixed $status
     * @param mixed $message
     * @param mixed $data
     * @return array
     */
    public function success($status, $message = "", $data = null)
    {
        return $this->success->success($status, $message, $data)->handle();
    }
    public function successOk($message = "", $data = null)
    {
        return $this->success->ok($message, $data)->handle();
    }
    public function successCreated($message = "", $data = null)
    {
        return $this->success->created($message, $data)->handle();
    }
    public function successNoContent($message = "", $data = null)
    {
        return $this->success->noContent($message, $data)->handle();
    }
    public function successNotModified($message = "", $data = null)
    {
        return $this->success->notModified($message, $data)->handle();
    }
    /**
     * Summary of error
     * @param mixed $status
     * @param mixed $message
     * @param mixed $errors
     * @return array
     */
    public function error($status, $message, $errors)
    {
        return $this->error->error($status, $message, $errors)->handle();
    }
    public function errorBadRequest($message, $errors = ['Bad Request.'])
    {
        return $this->error->badRequest($message, $errors)->handle();
    }
    public function errorUnauthorized($message, $errors = ["Unauthorized."])
    {
        return $this->error->unauthorized($message, $errors)->handle();
    }
    public function errorForbidden($message, $errors = ["Forbidden."])
    {
        return $this->error->forbidden($message, $errors)->handle();
    }
    public function errorNotFound($message, $errors = ["Not Found."])
    {
        return $this->error->notFound($message, $errors)->handle();
    }
    public function errorConflict($message, $errors = ["Conflict."])
    {
        return $this->error->conflict($message, $errors)->handle();
    }
    public function errorInternalServerError($message, $errors = ["Internal Server Error."])
    {
        return $this->error->internalServerError($message, $errors)->handle();
    }
}
