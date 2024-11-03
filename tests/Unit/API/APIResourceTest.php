<?php

namespace Tests\Unit\API;

use App\Services\API\APIResource;
use App\Services\API\Facade\Cases\APICases;
use PHPUnit\Framework\TestCase;

class APIResourceTest extends TestCase
{
    private $api;
    private $data;
    protected function setUp(): void
    {
        $this->api = new APIResource();
        $this->data = ['key'=>'value'];
    }
    public function test_success()
    {
        $status = APICases::OK;
        $message = "done!";

        $use = $this->api->success( $status, $message, $this->data);
        $this->assertEquals(
            [
                'status'=>$status,
                'message'=>$message,
                'data'=>$this->data,
                'errors'=>[],
            ],
            $use
        );
    }
    public function test_success_ok()
    {
        $status = APICases::OK;
        $message = "done!";
        $use = $this->api->successOk( $message, $this->data);
        $this->assertEquals(
            [
                'status'=>$status,
                'message'=>$message,
                'data'=>$this->data,
                'errors'=>[],
            ],
            $use
        );
    }
    public function test_success_created()
    {
        $status = APICases::CREATED;
        $message = "created!";
        $use = $this->api->successCreated($message);
        $this->assertEquals(
            [
                'status'=>$status,
                'message'=>$message,
                'data'=>null,
                'errors'=>[],
            ],
            $use
        );
    }
    public function test_success_no_content()
    {
        $status = APICases::NO_CONTENT;
        $message = "no content!";
        $use = $this->api->successNoContent( $message);
        $this->assertEquals(
            [
                'status'=>$status,
                'message'=>$message,
                'data'=>null,
                'errors'=>[],
            ],
            $use
        );
    }
    public function test_success_not_modified()
    {
        $status = APICases::NOT_MODIFIED;
        $message = "not modified!";
        $use = $this->api->successNotModified( $message);
        $this->assertEquals(
            [
                'status'=>$status,
                'message'=>$message,
                'data'=>null,
                'errors'=>[],
            ],
            $use
        );
    }
    public function test_error()
    {
        $status = APICases::BAD_REQUEST;
        $message = "bad request!";
        $errors = ['Bad Request.'];
        $use = $this->api->error($status, $message, $errors);
        $this->assertEquals(
            [
                'status'=>$status,
                'message'=>$message,
                'data'=>null,
                'errors'=>['Bad Request.'],
            ],
            $use
        );
    }
    public function test_error_bad_request()
    {
        $status = APICases::BAD_REQUEST;
        $message = "bad request!";
        $errors = ['Bad Request.'];
        $use = $this->api->errorBadRequest( $message);
        $this->assertEquals(
            [
                'status'=>$status,
                'message'=>$message,
                'data'=>null,
                'errors'=>$errors,
            ],
            $use
        );
    }
    public function test_error_unauthorized()
    {
        $status = APICases::UNAUTHORIZED;
        $message = "unauthorized!";
        $errors = ['Unauthorized.'];
        $use = $this->api->errorUnauthorized( $message);
        $this->assertEquals(
            [
                'status'=>$status,
                'message'=>$message,
                'data'=>null,
                'errors'=>$errors,
            ],
            $use
        );
    }
    public function test_error_forbidden()
    {
        $status = APICases::FORBIDDEN;
        $message = "forbidden!";
        $errors = ['Forbidden.'];
        $use = $this->api->errorForbidden( $message);
        $this->assertEquals(
            [
                'status'=>$status,
                'message'=>$message,
                'data'=>null,
                'errors'=>$errors,
            ],
            $use
        );
    }
    public function test_error_not_found()
    {
        $status = APICases::NOT_FOUND;
        $message = "not found!";
        $errors = ['Not Found.'];
        $use = $this->api->errorNotFound( $message);
        $this->assertEquals(
            [
                'status'=>$status,
                'message'=>$message,
                'data'=>null,
                'errors'=>$errors,
            ],
            $use
        );
    }
    public function test_error_conflict()
    {
        $status = APICases::CONFLICT;
        $message = "conflict!";
        $errors = ['Conflict.'];
        $use = $this->api->errorConflict( $message);
        $this->assertEquals(
            [
                'status'=>$status,
                'message'=>$message,
                'data'=>null,
                'errors'=>$errors,
            ],
            $use
        );
    }
    public function test_error_internal_server_error()
    {
        $status = APICases::INTERNAL_SERVER_ERROR;
        $message = "internal server error!";
        $errors = ['Internal Server Error.'];
        $use = $this->api->errorInternalServerError( $message);
        $this->assertEquals(
            [
                'status'=>$status,
                'message'=>$message,
                'data'=>null,
                'errors'=>$errors,
            ],
            $use
        );
    }
}
