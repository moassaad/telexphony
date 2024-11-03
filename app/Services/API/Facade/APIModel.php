<?php

namespace App\Services\API\Facade;



class APIModel
{
    protected int $status;
    protected string $message;
    protected mixed $data;
    protected array $errors;
    public function __construct()
    {
        $this->status = 200;
        $this->message = "";
        $this->data = null;
        $this->errors = [];
    }
    public function setStatus($status){ $this->status = $status;}
    public function getStatus(){ return $this->status;}
    public function setMessage($message){ $this->message = $message;}
    public function getMessage(){ return $this->message;}
    public function setData($data){ $this->data = $data;}
    public function getData(){ return $this->data;}
    public function setErrors($errors){ $this->errors = $errors;}
    public function getErrors(){ return $this->errors;}
    protected function set($status = APICases::OK, $message = "", $data = null, $errors = [])
    {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
        $this->errors = $errors;
    }
    protected function format()
    {
        return [
            'status'    =>  $this->status,
            'message'   =>  $this->message,
            'data'      =>  $this->data,
            'errors'    =>  $this->errors,
        ];
    }
}
