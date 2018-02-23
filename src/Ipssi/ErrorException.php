<?php

namespace Ipssi;


use Throwable;

class ErrorException extends \Exception
{
    public function __construct()
    {
        set_error_handler(array($this, 'handler'), E_ALL);
    }

    public function handler($errno, $errstr, $errfile, $errline)
    {
        $exception = new self($errstr, $errno);
        $exception->code = $errno;
        $exception->message = $errstr;
        $exception->file = $errfile;
        $exception->line = $errline;

        throw $exception;
    }
}