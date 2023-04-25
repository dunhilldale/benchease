<?php

namespace App\Exceptions;

use Exception;

class ClientException extends Exception
{
    public function __construct(int $code, string $message)
    {
        $this->code = $code;
        $this->message = $message;
    }
    //
}
