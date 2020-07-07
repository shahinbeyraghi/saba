<?php


namespace Core;


class Response
{
    public $code;
    public $message;
    public $data;

    public function __construct($code, $data = null, $message = null)
    {
        $this->code = $code;
        $this->data = $data;
        $this->message = $message;
        return $this;
    }
}